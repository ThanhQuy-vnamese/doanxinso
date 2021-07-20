<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabslide extends Model
{
    protected $fillable = [
          '	tenslider',  'hinhanhslide',  'trangthai', 'mota'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabslides';
}
