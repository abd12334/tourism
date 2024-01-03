<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the cities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function show(City $city)
{
    return view('cities.show', compact('city'));
}

    /**
     * Show the form for creating a new city.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created city in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
        ]);

        City::create($request->all());

        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }
    /**
     * Show the form for editing the specified city.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified city in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
{
    $request->validate([
        'name' => 'required|string',
        'country' => 'required|string',
    ]);

    $city->update($request->all());

    return redirect()->route('cities.index')->with('success', 'City updated successfully.');
}

    /**
     * Remove the specified city from the database.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {

        if ($city->ticket()->count() > 0) {

            $city->ticket()->delete();
        }

        $city->delete();

        return redirect()->route('cities.index')->with('success');
    }
    
}
