<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotels;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotels::all();
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('hotels.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ]);

        Hotels::create($request->all());


        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotels  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotels $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotels  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotels $hotel)
    {
        $cities = City::all();
        return view('hotels.edit', compact('hotel', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotels  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotels $hotel)
    {
        $request->validate([
            'name' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ]);

        $hotel->update($request->all());

        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotels  $hotel
     * @return \Illuminate\Http\Response
     */ public function destroy(Hotels $hotel)
    {
        if ($hotel->rates()->count() > 0) {
            $hotel->rates()->delete();
        }

        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'تم حذف الفندق بنجاح');
    }
}
