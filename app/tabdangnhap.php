<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabdangnhap extends Model
{
    protected $fillable = [
          'username', 'email', 'password', 'provider', 'provider_id','chucvu','diemthuong','id_thongtindangki','created_at','updated_at','remember_token'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabdangnhaps';
}
