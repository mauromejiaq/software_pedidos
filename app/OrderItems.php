<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'order_items';
	protected $fillable = ['product_id','qty','price','order_id'];
}
