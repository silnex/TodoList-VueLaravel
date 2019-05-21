@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('todo.store') }}" method="POST">
                <div class="card">
                    <div class="card-header">
                        {{ $date }} - Todo
                    </div>
                    @component('components.editor', ['todo' => null])
                    create
                    @endcomponent
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-1">
        <div class="btn-group float-left">
            <a href="{{ route('todo.list', $date) }}" class="btn btn-primary">목록으로</a>
        </div>
        <div class="btn-group float-right">
            <a href="javascript:$('form').submit()" class="btn btn-success">생성완료</a>
        </div>
    </div>
</div>

@endsection
