<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabduyethoadon extends Model
{
    protected $fillable = [
          '	mahd',  'makh','firstname','	lastname',  'tongtien','ngayxuathoadon'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabduyethoadons';
}
