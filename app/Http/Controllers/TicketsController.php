<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tickets;
use App\Models\companies;
use App\Models\city;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreticketsRequest;
use App\Http\Requests\UpdateticketsRequest;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = tickets::all();
        return view('tickets.all', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tickets = tickets::all();
        $companies = companies::all();
        $cities = city::all();
        return view('tickets.add',['tickets' => $tickets,'cities'=>$cities,'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'city_id' => ['required','numeric',Rule::exists('cities', 'id')],
            'company_id' => ['required','numeric',Rule::exists('companies', 'id')],
            'date_s' => ['required','date'],
            'date_e' => ['required','date'],
        ];
        $validateTicket = validator::make($request->all(), $validate);
        // if ($validateTicket->fails()) {
        //     return redirect()->back()
        //             ->withErrors($validateTicket)
        //             ->withInput();
        // }
        tickets::create($request->all());
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(tickets $tickets,$id)
    {
        $ticket = tickets::find($id);
        return view('show.ticket', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tickets $tickets,$id)
    {
        $ticket = tickets::find($id);
        $companies = companies::all();
        $cities = city::all();
        return view('tickets.edit',['ticket' => $ticket,'cities'=>$cities,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validate = [
            'city_id' => ['required','numeric',Rule::exists('cities', 'id')],
            'company_id' => ['required','numeric',Rule::exists('companies', 'id')],
            'date_s' => ['required','date'],
            'date_e' => ['required','date'],
        ];
        $validateTicket = validator::make($request->all(), $validate);
        if ($validateTicket->fails()) {
            return redirect()->back()
                    ->withErrors($validateTicket)
                    ->withInput();
        }
        $ticket = tickets::find($id);
        $ticket->update($request->all());
        return redirect()->route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = tickets::find($id);
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
