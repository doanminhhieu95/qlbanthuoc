<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vitri extends Model
{
    //
    Protected $table = "vitri";
    protected $fillable = [
        'id',
        'name'
    ];
    public function thuoc(){
        return $this->hasMany('App\thuoc','idvitri','id');
    }
}
