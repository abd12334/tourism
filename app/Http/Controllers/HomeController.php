<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\customers;
use App\Models\city;
use App\Models\hotels;
use App\Models\companies;
use App\Models\tickets;
use App\Models\rates;
use App\Models\bookings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

session_start();
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function all()
    {
        $users = User::all();
        return view('users.all', ['users' => $users]);
    }
    public function show(User $user, $id)
    {
        $user = User::find($id);
        return view("users.profile", ['user' => $user]);
    }
    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        $user->delete;
        return redirect()->route('users');
    }
    public function editPass(User $user, $id)
    {
        $user = User::find($id);
        return view('users.changePass', ['user' => $user]);
    }
    public function updatePass(Request $request, $id)
    {
        $validate = [
            'password' => 'required|string|min:8',
        ];
        $validateUser = validator::make($request->all(), $validate);
        if ($validateUser->fails()) {
            return redirect()->back()
                ->withErrors($validateUser)
                ->withInput();
        }
        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('profile', ['id' => $user->id]);
    }
    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('users.update', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $validate = [
            'name' => 'required|string|min:5|max:255',
            'email' => ['required', Rule::unique('users', 'email')->ignore($request->id), 'email', 'min:11', 'ends_with:@gmail.com']
        ];
        $validateUser = validator::make($request->all(), $validate);
        if ($validateUser->fails()) {
            return redirect()->back()
                ->withErrors($validateUser)
                ->withInput();
        }
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('home');
    }
    public function createRecord()
    {
        $cities = city::all();
        $hotels = hotels::all();
        $companies = companies::all();
        return view('newRecord', ['cities' => $cities, 'hotels' => $hotels, 'companies' => $companies]);
    }
    public function storeRecord(Request $request)
    {
        // dd(request()->all());
        $validateData = request()->validate([
            'city_id' => 'required|exists:cities,id',
            'company_id' => 'required|exists:companies,id',
            'hotel_id' => 'required|exists:hotels,id',
            'date_s' => 'required|date',
            'date_e' => 'required|date',
            'name' => 'required|string|min:5|max:255',
            'email' => ['required', Rule::unique('customers', 'email')->ignore($request->id), 'email', 'min:11'],
            'phone' => ['required', 'integer', Rule::unique('customers', 'phone')->ignore($request->id)],
            'gender' => 'required|string|min:2'
        ]);
        $customer = new customers;
        $customer->name = $validateData['name'];
        $customer->phone = $validateData['phone'];
        $customer->gender = $validateData['gender'];
        $customer->email = $validateData['email'];
        $customer->save();
        $lastCustomer = customers::orderBy('id', 'desc')->first();

        $ticket = new tickets;
        $ticket->company_id = $validateData['company_id'];
        $ticket->city_id = $validateData['city_id'];
        $ticket->date_s = $validateData['date_s'];
        $ticket->date_e = $validateData['date_e'];
        $ticket->save();
        $lastTicket = tickets::orderBy('id', 'desc')->first();

        $booking = new bookings;
        $booking->ticket_id = $lastTicket->id;
        $booking->customer_id = $lastCustomer->id;
        $booking->hotel_id = $validateData['hotel_id'];
        $booking->date = $validateData['date_e'];
        $booking->save();
        $bookings = Bookings::all();
        return view('bookings.index', compact('bookings'));


        // return view('home');
    }
    public function showTopHotels()
    {

        $hotels = Hotels::with('rates')->get();
        $topRatedHotels = $hotels->sortByDesc(function ($hotel) {
            return $hotel->rates->avg('stare');
        })->take(3);
        return view('home', ['topRatedHotels' => $topRatedHotels]);
    }

}
