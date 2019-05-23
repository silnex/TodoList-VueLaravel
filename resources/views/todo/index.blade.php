@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Todos
                </div>
                <ul class="list-group">
                    @foreach ($todoDays as $todoDay)
                    <a href="{{ route('todo.list', $todoDay->day) }}"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $todoDay->day }}
                        <span class="badge badge-primary badge-pill">{{ $todoDay->todo_count }}</span>
                    </a>
                    @endforeach
                </ul>
            </div>
            <div class="d-flex justify-content-between m-2 align-items-center">
                <div></div>
                @component('components.pagination', ['paginate' => $todoDays])
                @endcomponent

                <div class="btn-group float-right m-2">
                    <a href="{{ route('todo.create') }}" class="btn btn-success">새로만들기</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
