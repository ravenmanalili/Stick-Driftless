<?php

namespace App\Http\Controllers;

use App\Models\Gamepad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    public function update(Request $request)
    {
        // Log incoming request for debugging
        Log::info('Update request received', [
            'request_data' => $request->except(['gamepad_image']) // Don't log binary image data
        ]);

        $validator = Validator::make($request->all(), [
            'gamepad_id' => 'required|integer|exists:gamepad,gamepad_id',
            'gamepad_name' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'gamepad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            DB::beginTransaction();
            
            // Get current gamepad data to access current image
            $currentGamepad = DB::table('gamepad')
                ->where('gamepad_id', $request->gamepad_id)
                ->first();
            
            // Prepare update data
            $updateData = [
                'gamepad_name' => $request->gamepad_name,
                'platform' => $request->platform,
                'price' => $request->price
            ];
            
            // Handle image upload if provided
            if ($request->hasFile('gamepad_image')) {
                $image = $request->file('gamepad_image');
                $imageName = time() . '_' . $request->gamepad_id . '.' . $image->getClientOriginalExtension();
                
                // Store the new image in the public assets/images directory
                $image->move(public_path('assets/images'), $imageName);
                
                // Delete old image if it exists and is not a default image
                if ($currentGamepad && $currentGamepad->gamepad_image && file_exists(public_path('assets/images/' . $currentGamepad->gamepad_image))) {
                    unlink(public_path('assets/images/' . $currentGamepad->gamepad_image));
                }
                
                // Add image name to update data
                $updateData['gamepad_image'] = $imageName;
            }
            
            // Perform the update
            $updatedGamepad = DB::table('gamepad')
                ->where('gamepad_id', $request->gamepad_id)
                ->update($updateData);

            // Get updated gamepad for response
            $gamepad = DB::table('gamepad')
                ->where('gamepad_id', $request->gamepad_id)
                ->first();
                
            DB::commit();
            
            Log::info('Gamepad updated successfully', [
                'gamepad_id' => $request->gamepad_id,
                'updated_data' => array_merge($updateData, ['gamepad_image' => $updateData['gamepad_image'] ?? 'unchanged']),
                'result' => $gamepad
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Gamepad updated successfully',
                'data' => $gamepad
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            
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
}