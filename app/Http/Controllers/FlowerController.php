<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flowers = flower::all();
        $flowers = flower::orderBy('created_at', 'desc')->paginate(10);
        return view('flowers.index', compact('flowers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('flowers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required csv,txt,xlx,xls,p',
        ]);

        // Create a new instance of flower model
        $flower = new flower();

        // Set the values of the flower properties from the request data
        $flower->name = $validateData['name'];
        $flower->description = $validateData['description'];
        $flower->image_url = $validateData['image_url'];

        // Upload and set the cover image_url
      

        // Save the flower to the database
        $flower->save();
        Session::flash('success', 'Add New flower Successfully');
        return redirect()->route('flowers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(flower $flower)
    {
        $flowers = flower::all();
        return view('flowers.show', compact('flower'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(flower $flower)
    {
        return view ('flowers.edit', compact('flower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);

        // Find the flower by ID
        $flower = flower::findOrFail($id);

        // Update the flower properties from the request data
        $flower->name = $validateData['name'];
        $flower->description = $validateData['description'];
        $flower->image_url = $validateData['image_url'];

        // Upload and update the cover image_url_url if provided

        // Save the updated flower to the database
        $flower->save();
        Session::flash('success', 'flower updated successfully');
        return redirect()->route('flowers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(flower $flower)
    {
        $flower->delete();
        return redirect()->route('flowers.index')->with('success', 'flower deleted successfully');
    }
}