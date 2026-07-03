<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FootballMatch;
use Illuminate\Http\Request;

class FootballMatchController extends Controller
{
    public function index()
    {
        return FootballMatch::with(['homeTeam', 'awayTeam'])->get();
}
    

    public function store(Request $request)
    {
        $match = FootballMatch::create([
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id,
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'stadium' => $request->stadium,
        ]);

        return response()->json([
            'message' => 'Match berhasil ditambahkan',
            'data' => $match
        ], 201);
    }

    public function show(string $id)
    {
        return FootballMatch::with(['homeTeam', 'awayTeam'])->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $match = FootballMatch::findOrFail($id);

        $match->update($request->all());

        return response()->json([
            'message' => 'Match berhasil diupdate',
            'data' => $match
        ]);
    }

    public function destroy(string $id)
    {
        $match = FootballMatch::findOrFail($id);

        $match->delete();

        return response()->json([
            'message' => 'Match berhasil dihapus'
        ]);
    }
}