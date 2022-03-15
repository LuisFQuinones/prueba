<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    static $rules=
    [
        'doc'=>'required',
        'title'=>'required',
        'descripcion'=>'required',
        'hora'=>'required',
        'start'=>'required',
        'end'=>'required'
    ];

    protected $fillable=['doc','title','descripcion','hora','start','end'];
}


