<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Flower;
use Illuminate\Support\Facades\Session;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = region::all();
        $regions = region::orderBy('created_at', 'desc')->paginate(10);
        return view('regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flowers = flower::all();
        return view('regions.add', compact('flowers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //$_POST 
    {
        $validateData = $request->validate([
            'nameFlower' => 'required',
            'region_name' => 'required',
        ]);

        $flower = flower::where('name', $validateData['nameFlower'])->first();

        $region = new region();
        $region->flower_id = $flower->id;
        $region->region_name = $validateData['region_name'];

        $region->save();
        Session::flash('success', 'Add New region Sucessful');
        return redirect()->route('regions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(region $region)
    {
        return view('regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $flowers = flower::all();
        $region = region::find($id);
        $flower = flower::find($region->flower_id);
        return view('regions.edit', compact('flowers', 'flower', 'region'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id )
    {
        $validateData = $request->validate([
            'nameFlower' => 'required',
            'region_name' => 'required',
        ]);

        $flower = flower::where('name', $validateData['nameFlower'])->first();

        $region = region::find($id);
        $region->flower_id = $flower->id;
        $region->region_name = $validateData['region_name'];

        $region->save();
        Session::flash('success', 'Edit Info region Sucessful');
        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')->with('success', 'Region Deleted Successfully');
    }
}