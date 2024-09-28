<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'photopath' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handle the uploaded image
        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/product/'), $photoname);
        $data['photopath'] = $photoname;

        // Create the product
        Product::create($data);

        // Redirect to the product index with success message
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'status' => 'required|in:Show,Hide',
            'category_id' => 'required|exists:categories,id',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust as needed
        ]);

        // Update the product with validated data
        $product->update($validatedData);

        // Handle photo upload if present
        if ($request->hasFile('photopath')) {
            // Store and update the photo path
            $path = $request->file('photopath')->store('products', 'public');
            $product->update(['photopath' => $path]);
        }

        // Redirect back to the index page or another page
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
