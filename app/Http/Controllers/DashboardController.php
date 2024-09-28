<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all products
        $products = Product::with('category')->get();

        // Fetch all categories
        $categories = Category::orderBy('priority', 'asc')->get();

        // Fetch all banners
        $banners = Banner::all();

        // Return the dashboard view with products, categories, and banners
        return view('dashboard', compact('products', 'categories', 'banners'));
    }
}
