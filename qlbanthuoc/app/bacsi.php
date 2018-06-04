<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bacsi extends Model
{
    //
    Protected $table = "bacsi";
    protected $fillable = [
        'id',
        'sohieu',
        'name',
        'diachi',
        'chungchi',
        'noicongtac',
        'taikhoan',
        'idkhoa'
    ];
    public function khoa(){
        return $this->belongsTo('App\khoa','idkhoa','id');
    }
}
