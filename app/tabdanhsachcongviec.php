<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabdanhsachcongviec extends Model
{
    protected $fillable = [
          '	tencongviec	',  'ngaybatdau',  'ngayketthuc'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabdanhsachcongviecs';
}
