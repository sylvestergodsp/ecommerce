<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index($id)
    {
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        $data = Product::singleProduct($id)->withPrices()->get()->first();

        return view('pages.testing.detailspage', compact('data'));
    }
}
