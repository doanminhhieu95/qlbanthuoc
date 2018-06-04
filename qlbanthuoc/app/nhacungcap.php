<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhacungcap extends Model
{
    //
    Protected $table = "nhacungcap";
    protected $fillable = [
        'id',
        'sohieu',
        'name',
        'diachi',
        'email',
        'website',
        'masothue',
        'ghichu',
        'dienthoai',
        'fax',
        'nguoilienhe',
        'khachhang',
        'idnhomncc'
    ];
    public function nhomncc(){
        return $this->belongsTo('App\nhomncc','idnhomncc','id');
    }
}
