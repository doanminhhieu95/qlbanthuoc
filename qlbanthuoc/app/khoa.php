<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    //
    Protected $table = "khoa";
    protected $fillable = [
        'id',
        'name',
        'ghichu'
    ];
    public function bacsi(){
        return $this->hasMany('App\bacsi','idbacsi','id');
    }
}
