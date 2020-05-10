<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
	protected $fillable = ['name','document_type','document_number','customer_firstname','customer_lastname','customer_address','customer_city','customer_email','created_at'];
}
