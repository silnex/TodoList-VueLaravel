<?php

namespace App\Http\Controllers\Api;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * construct todo controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('author.check')->only(['edit', 'update', 'destory', 'check', 'show']);

        $this->perPage = 5;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoDays = Todo::getTodoIndex(Auth::user(), $this->perPage, request()->page);
        return response()->json($todoDays);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'message' => __('todo.created')
        ]);
    }

    /**
     * Display the specified resource group by date
     *
     * @param String  $date
     * @return \Illuminate\Http\Response
     */
    public function list(String $date)
    {
        $todos = Auth::user()->getTodoList($date, $this->perPage);

        return response()->json([
            'date' => $date,
            'todos' => $todos
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response()->json([
            'date' => $todo->created_at->format('Y-m-d'),
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        [$todo->title, $todo->description] = [$request->title, $request->description];

        $todo->save();

        return response()->json([
            'message' => __('todo.updated')
        ]);
    }

    /**
     * Update todo done status
     *
     * @param \App\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function check(Todo $todo)
    {
        $todo->check = !$todo->check;
        $state = ($todo->check ? '완료' : '미완료');
        $todo->save();

        return response()->json([
            'message' => __('todo.checked', ['state' => $state])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json([
            'message' => __('todo.deleted')
        ]);
    }
}
