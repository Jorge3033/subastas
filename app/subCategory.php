<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
     protected $primaryKey='id';
    protected $fillable=['id','name','categoryId','status'];
}
