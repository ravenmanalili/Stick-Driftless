<?php

namespace App\Http\Controllers;

use App\Models\Gamepad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
            'request_data' => $request->all()
        ]);

        $validator = Validator::make($request->all(), [
            'gamepad_id' => 'required|integer|exists:gamepad,gamepad_id',
            'gamepad_name' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
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
            // Use direct SQL update to ensure all fields are updated
            DB::beginTransaction();
            
            $updated = DB::table('gamepad')
                ->where('gamepad_id', $request->gamepad_id)
                ->update([
                    'gamepad_name' => $request->gamepad_name,
                    'platform' => $request->platform,
                    'price' => $request->price
                ]);

            // Get updated gamepad for response
            $gamepad = DB::table('gamepad')
                ->where('gamepad_id', $request->gamepad_id)
                ->first();
                
            DB::commit();
            
            Log::info('Gamepad updated successfully', [
                'gamepad_id' => $request->gamepad_id,
                'updated_data' => [
                    'gamepad_name' => $request->gamepad_name,
                    'platform' => $request->platform,
                    'price' => $request->price
                ],
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