<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cachsudung extends Model
{
    //
    Protected $table = "cachsudung";
    protected $fillable = [
        'id',
        'sohieu',
        'name'
    ];
    public function thuoc(){
        return $this->hasMany('App\thuoc','idcachsd','id');
    }
}
