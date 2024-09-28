<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of categories
    public function index()
    {

        $categories = Category::orderBy('priority', 'asc')->get();

        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create'); // Show create form
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        Category::create($data); // Save category

        return redirect()->route('categories.index')->with('success', 'Category Created Successfully');
    }

    // Show the form for editing the specified category
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Fetch category by ID
        return view('categories.edit', compact('category')); // Show edit form
    }

    // Update the specified category in the database
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'priority' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id); // Fetch category by ID
        $category->update($data); // Update category

        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
    }

    // Remove the specified category from the database
    public function destroy($id)
{
    // Find the category by ID
    $category = Category::findOrFail($id);

    // Check if there are any products associated with this category
    if ($category->products()->count() > 0) {
        return redirect()->route('categories.index')->with('error', 'Category cannot be deleted because it has associated products.');
    }

    // Delete the category if no products are associated
    $category->delete();

    return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
}


}
