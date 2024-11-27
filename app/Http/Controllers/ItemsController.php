<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public readonly Item $item;

    public function __construct()
    {
        $this->item = new Item();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = $this->item->all();
        return view('items', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        return view('item_create', compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->item->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'found_date' => $request->input('found_date'),
            'category_id' => $request->input('category_id'),
            'location_id' => $request->input('location_id'),
            'status' => $request->input('status')
        ]);
        if ($created) {
            return redirect()->back()->with('message', 'Successfully created');
        }
        return redirect()->back()->with('message', "Error: couldn't create item");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $item = Item::with(['category', 'location'])->findOrFail($item->id);
        return view('item_show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        $locations = Location::all();
        $item = Item::with(['category', 'location'])->findOrFail($item->id);
        return view('item_edit', ['item' => $item], compact('categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->item->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->back()->with('message', 'Successfully updated');
        }
        return redirect()->back()->with('message', "Error: couldn't update item");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->item->where('id', $id)->delete();
        return redirect()->route('items.index')->with('message', 'Item deleted successfully');
    }
}
