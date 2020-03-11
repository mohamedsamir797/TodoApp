@extends('layouts.app')
@section('title')
    Todos
    @endsection

@section('content')
     <div class="container">
          <div class="row justify-content-center pt-3">
            <div class="card text-center" style="width: 70%;">
                <div class="card-header text-center">
                    <h1 class="display-3">All todos</h1>

                    <div>
                        @if(session()->has('message'))
                            <div class="alert alert-success mt-3">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                            @if(session()->has('delete'))
                                <div class="alert alert-danger mt-3">
                                    {{ session()->get('delete') }}
                                </div>
                            @endif
                            @if(session()->has('comp'))
                                <div class="alert alert-warning mt-3">
                                    {{ session()->get('comp') }}
                                </div>
                            @endif
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($todos as $todo)
                            <li class="list-group-item text-muted text-left" style="font-weight: bolder;">{{ $todo->title }}


                                <span style="float: right;">

                                    <form action="{{ route('todos.destroy',[$todo->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                     <button type="submit" class=" btn text-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                             </span>
                                <span style="float: right;margin-top: 8px;">
                                <a href="{{ route('todos.edit',[ $todo->id ]) }}" class="text-success mr-2"><i class="fas fa-edit"></i></a>
                             </span>
                                <span style="float: right; margin-top: 8px;margin-right: 10px;">
                                <a href="{{ route('todos.show',[ $todo->id ]) }}" class="mr-2"><i class="fas fa-eye"></i></a>
                             </span>
                                @if(!$todo->completed)
                                <span style="float: right; margin-top: 8px;margin-right: 50px;font-size: 40px;">
                                <a href="todos/{{ $todo->id }}/completed" class="mr-2 text-secondary"><i class="fas fa-check-circle"></i></a>
                             </span>
                                    @endif
                            </li>
                            @empty
                                 <p class="text-center">No Todos </p>
                        @endforelse
                    </ul>
                </div>
            </div>
          </div>
     </div>
    @endsection