<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'Show')->latest()->limit(10)->get();
        return view('welcome', compact('products'));
    }


    // view product
    public function viewproduct($id)
    {
        $product = Product::where('id', $id)->first(); // Fetches a single product instance

        if (!$product) {
            // If the product is not found, handle it gracefully (e.g., redirect or show error)
            return redirect()->back()->with('error', 'Product not found');
        }

        // Fetch related products
        $relatedproducts = Product::where('status', 'Show')
            ->where('category_id', $product->category->id)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        // Pass the single product instance to the view
        return view('viewproduct', compact('product', 'relatedproducts'));
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
