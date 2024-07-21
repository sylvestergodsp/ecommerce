<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // check if user is authenticated and which groups/tier the user belongs to
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // get products from the products table
        $product_data = Product::withPrices()->get();

        return view('pages.testing.productspage', compact('product_data'));
    }
}