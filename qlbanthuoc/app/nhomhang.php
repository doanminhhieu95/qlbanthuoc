<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomhang extends Model
{
    //
    Protected $table = "nhomhang";
    protected $fillable = [
        'id',
        'name',
        'dichvu',
        'dieutri',
        'an'
    ];
    public function thuoc(){
        return $this->hasMany('App\thuoc','idhang','id');
    }
}
