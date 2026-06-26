<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $todos = $request->user()->todos;
        return $this->apiSuccess($todos, 'Todos retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        $todo = $request->user()->todos()->create($request->validated());

        return $this->apiSuccess($todo, 'Todo created successfully', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoRequest $request, Todo $todo)
    {
        return $this->apiSuccess($todo, 'Todo retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());

        return $this->apiSuccess($todo, 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoRequest $request, Todo $todo)
    {
        $todo->delete();

        return $this->apiSuccess(null, 'Todo deleted successfully');
    }
}
