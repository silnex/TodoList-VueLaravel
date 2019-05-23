@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $date }} Todos
                </div>
                <ul class="list-group">
                    @foreach ($todos as $todo)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="custom-control custom-checkbox flex-fill">
                            <input type="checkbox" class="custom-control-input" id="todoCheck-{{$todo->id}}"
                                data-href="{{ route('todo.check', $todo->id) }}" onclick="checkTodo(this)"
                                {{ ($todo->check) ? ' checked' : '' }}>
                            <label class="custom-control-label" for="todoCheck-{{$todo->id}}">{{$todo->title}}</label>
                            <input type="hidden" class="input-group-text w-50 mr-3" value="{{$todo->title}}">
                            <p class="text-muted mt-1 text-monospace">
                                {{ Str::limit($todo->description, 50, '') }}
                                <a href="{{ route('todo.show', $todo->id) }}"
                                    class="text-reset font-weight-bold">(...)</a>
                            </p>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('todo.destroy', $todo->id) }}" onclick="remove(this)"
                                class="btn btn-danger remove">삭제</a>
                            <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-secondary">수정</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between m-2 align-items-center">
        <div></div>
        @component('components.pagination', ['paginate' => $todos])
        @endcomponent
        <div class="btn-group float-right">
            <a href="{{ route('todo.create') }}" class="btn btn-success">새로만들기</a>
            <a href="{{ route('todo.index') }}" class="btn btn-primary">모든 날짜</a>
        </div>
    </div>
</div>
@endsection
