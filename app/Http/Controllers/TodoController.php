<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class TodoController extends Controller
{
    /**
     * construct todo controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if ($request->todo->authorCheck(Auth::user()->id)) {
                return $next($request);
            } else {
                abort(403);
            }
        })->only(['edit', 'update', 'destory', 'check', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoDays = Todo::getIndexPaginator(Auth::user(), 2, request()->page);
        return view('todo.index', ['todoDays' => $todoDays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create', [
            'date' => now()->format('Y-m-d'),
        ]);
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

        return redirect()
            ->route('todo.list', now()->format('Y-m-d'));
    }

    /**
     * Display the specified resource group by date
     *
     * @param String  $date
     * @return \Illuminate\Http\Response
     */
    public function list(String $date)
    {
        $todos = Auth::user()
            ->todos()
            ->whereDate('created_at', $date)
            ->paginate(3);

        return view('todo.list', [
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
        return view('todo.view', [
            'date' => $todo->created_at->format('Y-m-d'),
            'todo' => $todo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', [
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

        return redirect()
            ->route('todo.show', $todo->id);
    }

    /**
     * Update todo done status
     *
     * @param \App\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function check(Todo $todo)
    {
        // if ($todo->authorChceck(auth()->id)) {
        //     abort(403);
        // }
        $todo->check = !$todo->check;
        $todo->save();

        return ['state' => 'ok'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        // if ($todo->authorChceck(auth()->id)) {
        //     abort(403);
        // }

        $todo->delete();
        return ['state' => 'ok'];
    }
}
