<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return Team::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $team = Team::create([
        'name' => $request->name,
        'city' => $request->city,
        'coach' => $request->coach,
        'stadium' => $request->stadium,
        'founded_year' => $request->founded_year,
    ]);

    return response()->json([
        'message' => 'Team berhasil ditambahkan',
        'data' => $team
    ], 201);
    }

    public function show(string $id)
    {
         return Team::findOrFail($id);
}
    

   
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

    $team->update($request->all());

    return response()->json([
        'message' => 'Team berhasil diupdate',
        'data' => $team
    ]);
    }

    
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);

    $team->delete();

    return response()->json([
        'message' => 'Team berhasil dihapus'
    ]);
    }
}
