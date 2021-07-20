<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabsocial extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'name', 'email', 'password', 'provider', 'provider_id'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tabsocials';
}
