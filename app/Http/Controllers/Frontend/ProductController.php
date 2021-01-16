<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct($slug)
    {
        $product=Product::with(['photos','brand','categories'])->where('slug',$slug)->first();
        //dd($product);
        return view('frontend.products.index',compact(['product']));
    }
}
