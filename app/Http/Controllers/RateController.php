<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rates;
use App\Models\customers;
use App\Models\hotels;


class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rates::all();
        return view('rates.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customers::all();
        $hotels = hotels::all();
        return view('rates.create',['customers' =>$customers,'hotels'=>$hotels]);
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
            'customer_id' => 'required|exists:customers,id',
            'hotel_id' => 'required|exists:hotels,id',
            'comment' => 'required|string',
            'star' => 'required|in:1,2,3,4,5',
        ]);

        Rates::create($request->all());

        return redirect()->route('rates.index')->with('success', 'Rate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rate = Rates::find($id);

        if (!$rate) {
            return redirect()->route('rates.index')->with('error', 'Rate not found.');
        }

        return view('rates.show', compact('rate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rate = Rates::find($id);
        $customers = Customers::all();
        $hotels = hotels::all();
        return view('rates.edit',['rate'=>$rate,'customers' =>$customers,'hotels'=>$hotels]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'hotel_id' => 'required|exists:hotels,id',
            'comment' => 'required|string',
            'star' => 'required|in:1,2,3,4,5',
        ]);

        $rate = Rates::find($id);
        $rate->update($request->all());

        return redirect()->route('rates.index')->with('success', 'Rate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rate = Rates::find($id);

        if (!$rate) {
            return redirect()->route('rates.index')->with('error', 'Rate not found.');
        }

        $rate->delete();

        return redirect()->route('rates.index')->with('success', 'Rate deleted successfully.');
    }
}
