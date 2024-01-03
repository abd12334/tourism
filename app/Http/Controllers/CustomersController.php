<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Http\Requests\StorecustomersRequest;
use App\Http\Requests\UpdatecustomersRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customers::all();
        return view('customers.all',['customers' => $customers, 'counter' => 1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecustomersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'name' => 'required|string|min:5|max:255',
            'email' => ['required',Rule::unique('customers','email')->ignore($request->id),'email','min:11'],
            'phone' => ['required','integer',Rule::unique('customers','phone')->ignore($request->id),'max:10','starts_with:9'],
            'gender' => 'required|string|min:2'
        ];
        $validateCustomer = validator::make($request->all(),$validate);
        if ($validateCustomer->fails()) {
            return redirect()->back()
                    ->withErrors($validateCustomer)
                    ->withInput();
        }
        customers::create($request->all());
        return redirect()->route('customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(customers $customers,$id)
    {
        $customer = Customers::find($id);
        return view("show.customer", ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(customers $customers,$id)
    {
        $customer = Customers::find($id);
        return view("customers.edit", ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecustomersRequest  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validate = [
            'name' => 'required|string|min:5|max:255',
            'email' => ['required',Rule::unique('customers','email')->ignore($request->id),'email','min:11','ends_with:@gmail.com'],
            'phone' => ['required','integer',Rule::unique('customers','phone')->ignore($request->id),'max:10','starts_with:9'],
            'gender' => 'required|string|min:2'
        ];
        $validateCustomer = validator::make($request->all(),$validate);
        if ($validateCustomer->fails()) {
            return redirect()->back()
                ->withErrors($validateCustomer)
                ->withInput();
        }
        $customer = Customers::find($id);
        $customer->update($request->all());
        return redirect()->route('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers::find($id);
        $customer->delete();
        return redirect()->route('customers');
    }
}
