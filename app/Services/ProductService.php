<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function getProductBySlug($slug)
    {
        return Product::where('slug',$slug)->firstOrFail();
    }
}