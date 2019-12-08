<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $primaryKey='id';
    protected $fillable=['id','name','LastName','mail','password','photo','status'];
}
