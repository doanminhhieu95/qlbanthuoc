<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    //
    Protected $table = "danhmuc";
    protected $fillable = [
        'id',
        'name'
    ];
    public function thuoc(){
        return $this->hasMany('App\thuoc','iddanhmuc','id');
    }
}
