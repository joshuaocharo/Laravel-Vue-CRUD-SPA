<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_details";
    public $timestamps = true;

    protected $fillable = [
		'order_id','product_id'
	];
}
