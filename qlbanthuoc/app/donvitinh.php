<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donvitinh extends Model
{
    //
    Protected $table = "donvitinh";
    protected $fillable = [
        'id',
        'name'
    ];
    public function thuoc(){
        return $this->hasMany(['App\thuoc','iddvt1','id'],['App\thuoc','iddvt2','id']);
    }
}
