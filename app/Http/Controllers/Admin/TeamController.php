<?php

namespace App\Http\Controllers\Admin;

use App\Teams;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $team = Teams::find($id);

        if ($team) {

            $team->update($request->all());

            return response()->json([
                'result' => [
                    'team' => $team
                ],
                'message' => 'edited team successfully',
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'result' => [],
                'message' => 'team not found',
                'status' => 404,
            ]);
        }
    }
}
