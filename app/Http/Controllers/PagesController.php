<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::where('status','Show')->latest()->limit(10)->get();
        return view('welcome', compact('products'));
    }

    // view product
    public function viewproduct()
    {
        return view('viewproduct');
    }






    // about page
    public function about()
    {
        return view('about');
    }
    // contact page
    public function contact()
    {
        return view('contact');
    }

}
