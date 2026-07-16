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

       $todo = $request->user()->todo;
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
         $todo = $request->user()->todo()->create($validate);

        $response = [
            'message' => 'data berhasil ditambahkan',
            'data' => new \app\Http\Resources\todoResource($todo)
        ];
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(todo $todo)
    {

        $response = [
            'message' => 'data berhasil diambil',
            'data' => new \App\Http\Resources\todoResource($todo)
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\app\Http\Requests\updateTodoRequest $request, todo $todo) {

        $validate = $request->validated();
        $todo->update($validate);
        $response = [
            'message' => 'data berhasil diupdate',
            'data' => new \app\Http\Resources\todoResource($todo)
        ];
        return response()->json($response, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo $todo) {
        $response = [
            'message' => 'data berhasil dihapus',
            'data' => new \app\Http\Resources\todoResource($todo)
        ];
        $todo->delete();
        return response()->json($response, 200);
    }


}
