@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        {{ $date }} - Todo
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="form-group">
                                <label for="todoTitle">Todo Title</label>
                                <input type="text" name="title" class="form-control" id="todoTitle">
                            </div>
                        </h5>
                        <hr>
                        <div class="form-group card-text">
                            <label for="todoDescription">Example textarea</label>
                            <textarea class="form-control" name="description" id="todoDescription" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-1">
        <div class="btn-group float-left">
            <a href="{{ route('todo.groupByDate', $date) }}" class="btn btn-primary">목록으로</a>
        </div>
        <div class="btn-group float-right">
            <a href="{{ route('todo.destroy', $todo->id) }}" class="btn btn-danger">삭제</a>
            <a href="javascript:$('form').submit()" class="btn btn-success">업데이트</a>
        </div>
    </div>
</div>

@endsection
