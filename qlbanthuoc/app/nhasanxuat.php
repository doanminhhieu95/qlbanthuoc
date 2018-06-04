<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhasanxuat extends Model
{
    //
    Protected $table = "nhasanxuat";
    protected $fillable = [
        'id',
        'sohieu',
        'name',
        'diachi',
        'dienthoai',
        'fax',
        'email',
        'website',
        'ghichu',
    ];
    public function thuoc(){
        return $this->hasMany('App\thuoc','idnsx','id');
    }
}
