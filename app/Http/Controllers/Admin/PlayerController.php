<?php

namespace App\Http\Controllers\Admin;

use App\Players;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    public function update(Request $request, $id)
    {
        $player = Players::find($id);

        if ($player) {
            $player->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'team_id' => $request->team_id,
            ]);

            return response()->json([
                'result' => [
                    'player' => $player
                ],
                'message' => 'edited player successfully',
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'result' => [],
                'message' => 'player not found',
                'status' => 404,
            ]);
        }
    }
}
