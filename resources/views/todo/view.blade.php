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
                    <a href="#"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span class="badge badge-primary badge-pill">checkbox</span>
                        description
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection