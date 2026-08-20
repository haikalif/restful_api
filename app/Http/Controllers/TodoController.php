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
        $todo = $request->user()->todo()->with('user')->paginate(2);
        return (new \App\Http\Resources\TodoCollection($todo))->additional([
            'message' => 'data berhasil diambil',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\storeTodoRequest $request)
    {

        $validate = $request->validated();
        $todo = $request->user()->todo()->create($validate);

        $response = [
            'message' => 'data berhasil ditambahkan',
            'data' => new \App\Http\Resources\todoResource($todo)
        ];
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(todo $todo)
    {
        $todo->load('user');
        $response = [
            'message' => 'data berhasil diambil',
            'data' => new \App\Http\Resources\todoResource($todo)
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\updateTodoRequest $request, todo $todo)
    {
        $this->authorize('update', $todo);

        $validate = $request->validated();
        $todo->update($validate);

        $response = [
            'message' => 'data berhasil diupdate',
            'data' => new \App\Http\Resources\todoResource($todo)
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, todo $todo)
    {
        $this->authorize('delete', $todo);

        $response = [
            'message' => 'data berhasil dihapus',
            'data' => new \App\Http\Resources\todoResource($todo)
        ];
        $todo->delete();
        return response()->json($response, 200);
    }

    public function restore(Request $request, $id)
    {
        $todo = todo::onlyTrashed()->findOrFail($id);
        if (!$todo) {
            return response()->json([
                'message' => 'data tidak ditemukan',
            ], 404);
        }

        $this->authorize('restore', $todo);

        $todo->restore();
        return response()->json([
            'message' => 'data berhasil dikembalikan',
            'data' => new \App\Http\Resources\todoResource($todo)
        ], 200);
    }

}
