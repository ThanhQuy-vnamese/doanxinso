<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabprovince extends Model
{
    protected $fillable = [
          '	namequanhuyen',  'type',  'matp'
    ];
 
    protected $primaryKey = 'maqh';
 	protected $table = 'tabquanhuyens';
}
