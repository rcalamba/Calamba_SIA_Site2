<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model 
{
public $timestamps = false; 
  
protected $primaryKey = 'numberUser';  
  
protected $table = 'tbluser'; 
  
protected $fillable = [ 
    'numberUser', 'userName', 'password' 
]; 
}
