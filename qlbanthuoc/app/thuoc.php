<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thuoc extends Model
{
    //
    Protected $table = "thuoc";
    protected $fillable = [
        'id',
        'idhang',
        'iddieutri',
        'masanpham',
        'name',
        'hoatchat',
        'idnsx',
        'iddvt1',
        'iddvt2',
        'heso',
        'idcachsd',
        'gianhap',
        'banbuon',
        'banle',
        'niemyet',
        'tonmax',
        'tonmin',
        'doisong',
        'idbaoquan',
        'idvitri',
        'ngaycanhbao',
        'soluongcanhbao',
        'theodon',
        'treem',
        'huongthan',
        'anhsang',
        'amuot',
        'bhyt',
        'quycach',
        'sodangky',
        'dangbaoche',
        'congtydangky',
        'thongtin',
    ];
    public function danhmuc(){
        return $this->belongsTo('App\danhmuc','iddanhmuc','id');
    }
    public function nhasanxuat(){
        return $this->belongsTo('App\nhasanxuat','idnsx','id');
    }
}
