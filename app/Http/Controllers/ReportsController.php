<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public readonly Report $report;

    public function __construct()
    {
        $this->report = new Report();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = $this->report->all();
        return view('reports', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        return view('report_create', compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->report->create([
            'item_name' => $request->input('item_name'),
            'description' => $request->input('description'),
            'report_date' => $request->input('report_date'),
            'reporter_name' => $request->input('reporter_name'),
            'category_id' => $request->input('category_id'),
            'location_id' => $request->input('location_id'),
        ]);
        if ($created) {
            return redirect()->back()->with('message', 'Successfully created');
        }
        return redirect()->back()->with('message', "Error: couldn't create report");
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        $report = Report::with(['category', 'location'])->findOrFail($report->id);
        return view('report_show', ['report' => $report]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        $categories = Category::all();
        $locations = Location::all();
        $report = Report::with(['category', 'location'])->findOrFail($report->id);
        return view('report_edit', ['report' => $report], compact('categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->report->where('id', $id)->update($request->except(['_token', '_method']));
        if ($updated) {
            return redirect()->back()->with('message', 'Successfully updated');
        }
        return redirect()->back()->with('message', "Error: couldn't update report");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->report->where('id', $id)->delete();
        return redirect()->route('reports.index')->with('message', 'Report deleted successfully');
    }
}
