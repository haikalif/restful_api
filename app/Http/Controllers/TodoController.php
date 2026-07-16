<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

       $todo = $request->User()->todo;
        $message = "data berhasil diambil";
        $response = [
            'message' => $message,
            'data' => \App\Http\Resources\todoResource::collection($todo)
        ];
        return response()->json($response, 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\app\Http\Requests\storeTodoRequest $request)
    {

        $validate = $request->validated();
         $todo = $request->User()->todo()->create($validate);

        $response = [
            'message' => 'data berhasil ditambahkan',
            'data' => $todo
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
            'data' => new \App\Http\Resources\todoResource($findTodo)
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, todo $todo) {

    $request->validate([
            'judul' => 'sometimes|string|max:255',
            'deskripsi' => 'nullable|string',
            'selesai' => 'required|boolean',
            'tanggal_selesai' => 'nullable|date',
            'prioritas' => 'nullable|in:rendah,sedang,tinggi',
            'kategori' => 'nullable|string|max:255',
        ]);
        $todo->update($request->all());
        $response = [
            'message' => 'data berhasil diupdate',
            'data' => $todo
        ];
        return response()->json($response, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo $todo) {
        $response = [
            'message' => 'data berhasil dihapus',
            'data' => $todo
        ];
        $todo->delete();
        return response()->json($response, 200);
    }


}
