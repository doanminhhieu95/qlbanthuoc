<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietthuoc extends Model
{
    //
    Protected $table = "chitietthuoc";
    protected $fillable = [
        'id',
        'name',
        'donvi',
        'nsx',
        'hsd',
        'soluong',
        'idnsx',
        'iddanhmuc'
    ];
    public function danhmuc(){
        return $this->belongsTo('App\danhmuc','iddanhmuc','id');
    }
    public function nhasanxuat(){
        return $this->belongsTo('App\nhasanxuat','idnsx','id');
    }
}
