<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomdieutri extends Model
{
    //
    Protected $table = "nhomdieutri";
    protected $fillable = [
        'id',
        'name',
        'ghichu'
    ];
    public function thuoc(){
        return $this->hasMany('App\thuoc','iddieutri','id');
    }
}
