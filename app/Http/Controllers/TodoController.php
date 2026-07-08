<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = todo::all();
        $massages = [
            'message' => 'Data berhasil diambil',
            'data' => $viewData
        ];
        return response()->json($massages, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'selesai' => 'boolean',
            'tanggal_selesai' => 'nullable|date',
            'prioritas' => 'nullable|string|in:rendah,normal,tinggi',
            'kategori' => 'nullable|string|max:255',
        ]);

        $todo = todo::create($validatedData);
        $massages = [
            'message' => 'Data berhasil ditambahkan',
            'data' => $todo
        ];
        return response()->json($massages, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(todo $todo)
    {

    $findTodo = todo::find($todo->id);
        if (!$findTodo) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        } 

        $massages = [
            'message' => 'Data berhasil diambil',
            'data' => $todo
        ];
        return response()->json($massages, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo $todo)
    {
        //
    }
}
