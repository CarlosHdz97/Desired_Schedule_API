<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model{
    public $timestamps = false;
    protected $fillable = [
        'id','descripcion'
    ];
}
