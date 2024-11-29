<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Image;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('House/Index', [
            'houses' => House::with('images')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('House/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'size' => 'required',
            'bedrooms' => 'required',
            'price' => 'required',
            'images' => '',
        ]);

        $house = House::create($validateData);


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $url = $image->store('images', 'public');
                $house->images()->create(['url' => $url]);
            }
        }
        $images = [];

        // foreach ($house['images'] as $image) {
        //     dd($image);
        //     $url = $image->file('images')->store('images', 'public');

        //     $images[] = [
        //         'url' => $url,
        //         'house_id' => $house->id,
        //     ];
        // }
        // $house->images()->createMany($images);
        return  redirect()->route('house.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(House $house)
    {
        return Inertia::render('House/Edit', [
            'house' => $house->load('images'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, House $house)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        $house->delete();

        return redirect()->route('house.index');
    }
}
