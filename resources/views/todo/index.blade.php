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
                    {{ dd($todoDays) }}
                    <a href="#" class="list-group-item list-group-item-actionn d-flex justify-content-between align-items-center active">
                        2019-04-16
                        <span class="badge badge-primary badge-pill">1</span>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection