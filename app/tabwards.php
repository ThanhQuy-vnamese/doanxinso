<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabwards extends Model
{
    protected $fillable = [
          '	namexaphuong',  'type',  'maqh'
    ];
 
    protected $primaryKey = 'xaid';
 	protected $table = 'tabxaphuongthitrans';
}
