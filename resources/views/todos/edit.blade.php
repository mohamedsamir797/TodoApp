@extends('layouts.app')

@section('title')
    New Todo
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="card text-center" style="width: 60%;">

                <h1 class="display-4">Add New Todo</h1>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item text-muted text-left">
                            <form action="{{ route('todos.update',[$todos->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control mb-3" value="{{ $todos->title }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="desc" class="form-control mb-3" value="{{ $todos->desc }}">
                                    @error('desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-outline-secondary"> Save Todo</button>
                                </div>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection