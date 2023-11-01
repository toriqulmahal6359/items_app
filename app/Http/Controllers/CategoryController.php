<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('dashboard', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|string|max:50"
        ]);

        Category::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Category Added Successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit', compact('id', 'category'));
    }

    public function update(Request $request, Category $category){
        $request->validate([
            "name" => "required|string|max:50"
        ]);

        $category = Category::find($request->id);
        if(!$category){
            return redirect()->route('dashboard')->with('error', 'Category not exists');
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->route('dashboard')->with('success', 'Category Updated Successfully');
    }

    public function delete($id){
        Category::destroy($id);
        return redirect()->route('dashboard')->with('success', 'Category Deleted Successfully');
    }

}
