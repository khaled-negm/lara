<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = ['name','price','detail'];
    use SoftDeletes;
    protected $dates=['deleted_at'];
    
}
