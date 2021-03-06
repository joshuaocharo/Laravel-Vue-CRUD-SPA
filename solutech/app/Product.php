<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $timestamps = true;

    protected $fillable = [
		'name','description','quantity'
	];
}
