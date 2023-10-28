<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'customer_id','billing_email','billing_name','billing_adress','billing_city','billing_province','billing_postalcode',
        'billing_phone','billing_name_on_card','billing_subtotal',
        'billing_total','error',
    ];


    public function user()
    {
        return $this->belogsTo('App\Models\Customer');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    }
}
