<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['quantity'];
    public function presetPrice()
    {
        $price = $this->price / 100;
        if($price === 0) return "";
        return number_format($price,2,',','').' €';
    }
}
