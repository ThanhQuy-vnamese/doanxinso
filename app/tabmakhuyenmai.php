<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabmakhuyenmai extends Model
{
    protected $fillable = [
          '	tenma',  'magiam',  'soluong','tinhnangma','phantramgiam'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabmakhuyenmais';
}
