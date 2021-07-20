<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabdangki extends Model
{
    protected $fillable = [
          'firstname', 'lastname', 'fullname', 'email', 'diachi','sdt','usename','password','created_at','updated_at'
    ];
 
    protected $primaryKey = 'id';
    protected $table = 'tabdangkis';
}
