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
                        <div
                            class="custom-control custom-checkbox flex-fill d-flex justify-content-between align-items-center">
                            <input type="checkbox" class="custom-control-input" id="todoCheck-{{$todo->id}}">
                            <label class="custom-control-label"
                                for="todoCheck-{{$todo->id}}">{{$todo->title}}</label>
                            <input type="hidden" class="input-group-text w-50 mr-3" value="{{$todo->title}}">
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-danger">삭제</a>
                            <a href="#" class="btn btn-primary">수정</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="btn-group float-right m-2">
        <a href="#" class="btn btn-primary">목록으로</a>
    </div>
</div>
@endsection