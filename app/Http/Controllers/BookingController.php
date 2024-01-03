<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Models\customers;
use App\Models\tickets;
use App\Models\hotels;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Bookings::all();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tickets = tickets::all();
        $hotels = hotels::all();
        $customers = customers::all();
        return view('bookings.create',['customers'=>$customers,'hotels'=>$hotels,'tickets'=>$tickets]);
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
            'ticket_id' => 'required|exists:tickets,id',
            'hotel_id' => 'required|exists:hotels,id',
            'date' => 'required|date',
        ]);

        Bookings::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Bookings $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookings  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Bookings::find($id);
        $tickets = tickets::all();
        $hotels = hotels::all();
        $customers = customers::all();
        return view('bookings.edit',['booking'=>$booking,'customers'=>$customers,'hotels'=>$hotels,'tickets'=>$tickets]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bookings  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookings $booking)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'ticket_id' => 'required|exists:tickets,id',
            'hotel_id' => 'required|exists:hotels,id',
            'date' => 'required|date',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookings  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookings $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
