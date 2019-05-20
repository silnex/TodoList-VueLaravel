@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $date }} - Todo
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $todo->title }}
                    </h5>
                    <hr>
                    <p class="card-text">
                        {{ $todo->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-1">
        <div class="btn-group float-left">
            <a href="#" class="btn btn-success">할일완료</a>
        </div>
        <div class="btn-group float-right">
            <a href="{{ route('todo.destroy', $todo->id) }}" class="btn btn-danger">삭제</a>
            <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-secondary">수정</a>
            <a href="{{ route('todo.groupByDate', $date) }}" class="btn btn-primary">목록으로</a>
        </div>
    </div>
</div>
@endsection
