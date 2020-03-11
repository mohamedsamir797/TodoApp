<?php

namespace App\Http\Controllers;

use App\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todos::all();
        return view('todos.index',['todos'=>$todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nicename =[
            'title'=>'title ',
            'desc'=>'description'
        ];
        $todos = $this->validate(request(),[
            'title'=>'required',
            'desc'=>'required'
        ],[],$nicename);

        Todos::create($todos);
        @session()->flash('message' ,'the new Todo has been added successfully');

        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todos = Todos::findOrFail($id);
        return view('todos.show',['todos'=>$todos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todos = Todos::findOrFail($id);
        return view('todos.edit',['todos'=>$todos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title'=>'required',
            'desc'=>'required'
        ]);
        $todos = Todos::findOrFail($id);
        $todos->title = $request->title ;
        $todos->desc = $request->desc ;
        $todos->save();

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todos::findOrFail($id);
        $todo->delete();
        session()->flash('delete','Todo has been deleted successfully');
        return redirect()->route('todos.index');
    }
    public function completed($id){
        $todo = Todos::findOrFail($id);
        $todo->completed = true ;
        $todo->save();
        session()->flash('comp','Todo has been completed successfuly ');
        return redirect()->route('todos.index');
    }
}
