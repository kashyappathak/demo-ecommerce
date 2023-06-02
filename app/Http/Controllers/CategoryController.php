<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::orderBy('created_at', 'DESC')->get();

        return view('categories.index', compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->route('categories')->with('success', 'Category added successfully');
    }

    public function show(string $id)
    {

        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));

    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request , string $id)
    {

        $category = Category::findOrFail($id);

        $category->update($request->all());

        return redirect()->route('categories')->with('success', 'category updated successfully');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories')->with('success', 'category deleted successfully');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('id');

        // Perform search query based on the provided search term and category ID

        // Example code:
        $results = Category::where('id', $categoryId)
                            ->where('category', 'like', '%'.$search.'%')
                            ->get();

        // Pass the search results to the view
        return view('search_results', compact('results'));
    }


}