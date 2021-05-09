<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public $table = "point";

    protected $fillable = [
        'id', 'name', 'prev_id', 'next_id', 'branch_id'
    ];
    public function branch(){
        return $this->belongsToMany('App\Branch');
    }
    public function binding(){
        return $this->belongsToMany('App\Binding');
    }
}
