<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class baoquan extends Model
{
    //
    Protected $table = "baoquan";
    protected $fillable = [
        'id',
        'sohieu',
        'name'
    ];
    public function thuoc(){
        return $this->hasMany('App\thuoc','idbaoquan','id');
    }
}
