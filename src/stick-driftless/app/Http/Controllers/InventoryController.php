<?php

namespace App\Http\Controllers;

use App\Models\Gamepad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class InventoryController extends Controller
{
    /**
     * Display a listing of the inventory.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $gamepads = Gamepad::all();
        return view('inventory', compact('gamepads'));
    }

    /**
     * Update the specified gamepad in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add(Request $request)
    {
        Log::info('Add request received', [
            'request_data' => $request->except(['gamepad_image']) // Don't log binary image data
        ]);

        $validator = Validator::make($request->all(), [
            'gamepad_name' => 'required|unique:gamepad,gamepad_name,NULL,id,status,1|string|max:255',
            'platform' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'gamepad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gamepad_description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed during add', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $imageName = null;

            if ($request->hasFile('gamepad_image')) {
                $image = $request->file('gamepad_image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images'), $imageName);
            }

            $gamepad = Gamepad::create([
                'gamepad_name' => $request->gamepad_name,
                'gamepad_description' => $request->gamepad_description,
                'platform' => $request->platform,
                'price' => $request->price,
                'gamepad_image' => $imageName,
                'status' => 1,
                'created_at' => now(),
            ]);

            Log::info('Gamepad added successfully', ['data' => $gamepad]);

            return response()->json([
                'success' => true,
                'message' => 'Gamepad added successfully',
                'data' => $gamepad
            ]);
        } catch (\Exception $e) {
            Log::error('Exception in add', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to add gamepad: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        // Log incoming request for debugging
        Log::info('Update request received', [
            'request_data' => $request->except(['gamepad_image']) // Don't log binary image data
        ]);

        $validator = Validator::make($request->all(), [
            'gamepad_id' => 'required|integer|exists:gamepad,gamepad_id',
            'gamepad_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('gamepad', 'gamepad_name')->where(function ($query) use ($request) {
                    return $query->where('status', 1)->where('gamepad_id', '!=', $request->gamepad_id);
                }),
            ],
            'platform' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'gamepad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gamepad_description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Get current gamepad data to access current image
            $currentGamepad = Gamepad::find($request->gamepad_id);

            if (!$currentGamepad) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gamepad not found'
                ], 404);
            }

            // Prepare update data
            $updateData = [
                'gamepad_name' => $request->gamepad_name,
                'platform' => $request->platform,
                'price' => $request->price,
                'gamepad_description' => $request->gamepad_description,
                'updated_at' => now(),
            ];

            // Handle image upload if provided
            if ($request->hasFile('gamepad_image')) {
                $image = $request->file('gamepad_image');
                $imageName = time() . '_' . $request->gamepad_id . '.' . $image->getClientOriginalExtension();

                // Store the new image in the public assets/images directory
                $image->move(public_path('assets/images'), $imageName);

                // Delete old image if it exists and is not a default image
                if ($currentGamepad->gamepad_image && file_exists(public_path('assets/images/' . $currentGamepad->gamepad_image))) {
                    unlink(public_path('assets/images/' . $currentGamepad->gamepad_image));
                }

                // Add image name to update data
                $updateData['gamepad_image'] = $imageName;
            }

            // Perform the update
            $currentGamepad->update($updateData);

            Log::info('Gamepad updated successfully', [
                'gamepad_id' => $request->gamepad_id,
                'updated_data' => $updateData,
                'result' => $currentGamepad
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Gamepad updated successfully',
                'data' => $currentGamepad
            ]);
        } catch (\Exception $e) {
            Log::error('Exception in update', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to update gamepad: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gamepad_id' => 'required|integer|exists:gamepad,gamepad_id',
        ]);

        if ($validator->fails()) {
            Log::error('Delete validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $gamepad = Gamepad::find($request->gamepad_id);

            if (!$gamepad) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gamepad not found or already deleted'
                ], 404);
            }

            // Soft delete the gamepad by setting status to 0
            $gamepad->update([
                'status' => 0,
                'updated_at' => now()
            ]);

            Log::info('Gamepad soft deleted', ['gamepad_id' => $request->gamepad_id]);

            return response()->json([
                'success' => true,
                'message' => 'Gamepad deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Exception during delete', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete gamepad: ' . $e->getMessage()
            ], 500);
        }
    }

    public function filter(Request $request) {
        $platform = $request->input('gamepad_platform');

        if ($platform) {
            $gamepads = Gamepad::where('platform', $platform)->where('status', 1)->get();
        } else {
            $gamepads = Gamepad::where('status', 1)->get();
        }

        return view('inventory', compact('gamepads'));
    }

    public function search(Request $request) {
        $searchQuery = $request->input('search');
        $platformFilter = $request->input('gamepad_platform');

        $query = Gamepad::query();

        if ($platformFilter) {
            $query->where('platform', $platformFilter);
        }

        if ($searchQuery) {
            $query->where('gamepad_name', 'like', '%' . $searchQuery . '%');
        }

        $gamepads = $query->where('status', 1)->get();

        return view('inventory', compact('gamepads'));
    }
}
