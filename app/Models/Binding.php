<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Binding extends Model
{

    public $table = "binding";

    protected $fillable = [
        'id', 'point_1_id', 'point_2_id',
    ];

    public function point_1(){
        return $this->hasOne('App\Point');
    }

    public function point_2(){
        return $this->hasOne('App\Point');
    }

}
