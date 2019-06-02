<?php

namespace App\Http\Controllers;

use App\Teams;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = empty($request->limit) ? 10 : $request->limit;
        $page = empty($request->page) ? 0 : $request->page;

        $teams = Teams::with('players')->take($limit)->skip($page*$limit)->get();

        return response()->json([
            'result' => [
                'teams' => $teams
            ],
            'message' => '',
            'status' => 200,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $team = Teams::where('name' , $request->name)->first();

        return response()->json([
            'result' => [
                'teams' => $team
            ],
            'message' => 'result for your search',
            'status' => 200,
        ]);
    }
}
