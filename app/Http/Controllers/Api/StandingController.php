<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Standing;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index()
    {
         return Standing::with('team')->get();
    }

    public function store(Request $request)
    {
        $standing = Standing::create($request->all());

        return response()->json([
            'message' => 'Standing berhasil ditambahkan',
            'data' => $standing
        ], 201);
    }

    public function show(string $id)
    {
         return Standing::with('team')->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $standing = Standing::findOrFail($id);

        $standing->update($request->all());

        return response()->json([
            'message' => 'Standing berhasil diupdate',
            'data' => $standing
        ]);
    }

    public function destroy(string $id)
    {
        $standing = Standing::findOrFail($id);

        $standing->delete();

        return response()->json([
            'message' => 'Standing berhasil dihapus'
        ]);
    }
}