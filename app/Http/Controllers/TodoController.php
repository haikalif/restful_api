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

        $todo = todo::all();
        $message = "data berhasil diambil";
        $response = [
            'message' => $message,
            'data' => $todo
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'selesai' => 'required|boolean',
            'tanggal_selesai' => 'nullable|date',
            'prioritas' => 'nullable|in:rendah,sedang,tinggi',
            'kategori' => 'nullable|string|max:255',
        ]);
        $response = [
            'message' => 'data berhasil ditambahkan',
            'data' => todo::create($request->all())
        ];
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(todo $todo)
    {

        $findTodo = todo::find($todo->id);
        $response = [
            'message' => 'data berhasil diambil',
            'data' => $findTodo
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, todo $todo) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo $todo) {}
}
