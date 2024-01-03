<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:companies|max:255',
            'phone' => 'required',
        ]);

        $company = new Companies;
        $company->name = $validatedData['name'];
        $company->phone = $validatedData['phone'];
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company added successfully.');
    }

    /**
     * Display the specified company.
     *
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $company)
    {
        $validatedData = $request->validate([
            'name' => ['required', Rule::unique('companies')->ignore($company->id), 'max:255'],
            'phone' => 'required',
        ]);

        $company->name = $validatedData['name'];
        $company->phone = $validatedData['phone'];
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified company from storage.
     *
     * @param  \App\Models\Companies  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
