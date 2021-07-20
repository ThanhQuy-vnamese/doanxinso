<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabsanphambanchay extends Model
{
    protected $fillable = [
          'masanpham','	tensanpham',  'soluong'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabsanphambanchays';
}
