<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
     protected $primaryKey='id';
    protected $fillable=['id','user','password','name','LastName','sex','mail','phone','photo','status'];
}
