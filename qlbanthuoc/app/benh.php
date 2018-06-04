<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class benh extends Model
{
    //
    Protected $table = "benh";
    protected $fillable = [
        'id',
        'name',
        'ghichu'
    ];
}
