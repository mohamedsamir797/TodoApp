<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $fillable =['title','desc','completed'];
    protected $attributes = [
        'completed'=> false ,
    ];
}
