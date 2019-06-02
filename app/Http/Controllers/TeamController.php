<?php

namespace App\Http\Controllers;

use App\Teams;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $limit = empty($request->limit) ? 10 : $request->limit;
        $page = empty($request->page) ? 0 : $request->page;
        $teams = Teams::with('players')->take($limit)->skip($page)->get();

        return response()->json([
            'result' => [
                'teams' => $teams
            ],
            'message' => '',
            'status' => 200,
        ]);
    }
}
