<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabkhachhangtiemnang extends Model
{
    protected $fillable = [
          '	firstname',  'lastname',  'diachi','thanhpho','congty','dienthoai','email','idkhachhang'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabkhachhangtiemnangs';
}
