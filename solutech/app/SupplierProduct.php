<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    protected $table = "supplier_products";
    public $timestamps = true;

    protected $fillable = [
		'supply_id','product_id'
	];
}
