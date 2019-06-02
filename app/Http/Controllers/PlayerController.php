<?php

namespace App\Http\Controllers;

use App\Players;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $player = Players::where('first_name', $request->first_name)
            ->orWhere('last_name', $request->last_name)->first();

        if (empty($player)) {
            return response()->json([
                'result' => [],
                'message' => 'not found',
                'status' => 404,
            ]);
        }
        return response()->json([
            'result' => [
                'player' => $player
            ],
            'message' => 'result for your search',
            'status' => 200,
        ]);
    }
}
