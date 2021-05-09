<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $table = "branch";

    protected $fillable = [
        'id', 'color', 'name',
    ];

    public function points(){
        return $this->hasMany('App\Point');
    }

}
