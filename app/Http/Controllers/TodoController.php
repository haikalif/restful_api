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



    }

    /**
     * Display the specified resource.
     */
    public function show(todo $todo)
    {




    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, todo $todo)
    {



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo $todo)
    {



    }
}
