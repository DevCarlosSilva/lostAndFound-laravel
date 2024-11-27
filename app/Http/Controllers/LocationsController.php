<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public readonly Location $location;

    public function __construct()
    {
        $this->location = new Location();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->location->create([
            'name' => $request->input('name')
        ]);
        if ($created) {
            return redirect()->back()->with('message', 'Successfully created');
        }
        return redirect()->back()->with('message', "Error: couldn't create location");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->location->where('id', $id)->delete();
        return redirect()->route('adminPanel')->with('message', 'Location deleted successfully');
    }
}
