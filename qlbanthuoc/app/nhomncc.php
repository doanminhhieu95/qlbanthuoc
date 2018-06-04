<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomncc extends Model
{
    //
    Protected $table = "nhomncc";
    protected $fillable = [
        'id',
        'sohieu',
        'name',
        'cknhap',
        'ckxuat',
        'ghichu'
    ];
    public function nhacungcap(){
        return $this->hasMany('App\nhacungcap','idncc','id');
    }
}
