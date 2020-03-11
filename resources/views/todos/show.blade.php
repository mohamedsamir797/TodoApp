@extends('layouts.app')

@section('title')
    todos
    @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="card text-center" style="width: 100%;">

                <h1 class="display-4">{{ $todos->title }}</h1>
                <small>{{ $todos->created_at }}</small>

            <div class="card-body">
                <ul class="list-group">

                    <li class="list-group-item text-muted text-left">
                        Details
                        <span style="float: right" class="badge badge-warning">
                            {{ boolval($todos->completed) ? 'compelted' : 'non completed' }}
                        </span>
                    </li>
                        <li class="list-group-item text-muted text-left">
                            {{ $todos->desc }}
                        </li>

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection