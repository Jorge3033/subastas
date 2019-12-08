<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presale extends Model
{
    protected $primaryKey='id';
    protected $fillable=['id','buyer','article','offeredPrice','status'];
}
