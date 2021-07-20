<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabfeeship extends Model
{
    protected $fillable = [
          'feematp','feemaqh','feexaid','feefeeship'
    ];
 
    protected $primaryKey = 'feeid';
 	protected $table = 'tabfeeships';
 	
 	public function city(){
 	    return $this->belongsTo('App\tabcity', 'feematp');
 	}
 	
 	public function province(){
 	    return $this->belongsTo('App\tabprovince', 'feemaqh');
 	}
 	
 	public function wards(){
 	    return $this->belongsTo('App\tabwards', 'feexaid');
 	}
}
