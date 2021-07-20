<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabproductordertoday extends Model
{
    protected $fillable = [
          '	mahd',  'tensanpham','soluong'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabproductordertodays';
}
