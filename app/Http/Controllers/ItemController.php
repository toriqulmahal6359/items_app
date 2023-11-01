<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $items = Item::with('category')->get();
        return view('items.view', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image.*' => 'nullable|image|mimes:jpeg,jpg,png|max:15360'
        ]);

        $item = Item::create($request->all());

        if($request->hasFile('image')){
            // $imgPath = $request->file('image')->store('public/media/items');
            // $item->update(['image' => $imgPath]);
            $file_name = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $file_name, 'public');
            $imgPath = '/storage/'.$path;
            $item->update(['image' => $imgPath]); 
        }

        return redirect()->route('dashboard')->with('success', 'Your Item was Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $items = Item::all();
        return view('items.show', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('items.edit', compact('id', 'item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title' => 'string|max:150',
            'description' => 'string|max:1000',
            'category_id' => 'exists:categories,id',
            'price' => 'numeric',
            'image.*' => 'nullable|image|mimes:jpeg,jpg,png|max:15360'
        ]);

        $item = Item::find($request->id);
        if (!$item) {
            return redirect()->route('dashboard')->with('error', 'Item not found');
        }

        // $item->update($request->all());

        $item->title = $request->title;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->price = $request->price;

        if($request->hasFile('image')){
            // $item->image = $request->file('image')->store('public/media/items');
            $file_name = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $file_name, 'public');
            $imgPath = '/storage/'.$path;
            $item->update(['image' => $imgPath]);
        }

        $item->save();

        return redirect()->route('dashboard')->with('success', 'Your Item was Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Item::destroy($id);
        return redirect()->route('dashboard')->with('success', 'Your Item was Deleted Successfully');
    }
}
