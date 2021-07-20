<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabcity extends Model
{
    protected $fillable = [
          '	nametinhthanhpho',  'type'
    ];
 
    protected $primaryKey = 'matp';
 	protected $table = 'tabtinhthanhphos';
}
