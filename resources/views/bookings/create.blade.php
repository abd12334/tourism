@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADD Booking') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf


                        <label for="">customer Name</label>
                        <select name="customer_id" id="">
                            @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">ticket date</label>
                        <select name="ticket_id" id="">
                            @foreach ($tickets as $ticket)
                            <option value="{{$ticket->id}}">{{$ticket->date_s}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">Hotel Name</label>
                        <select name="hotel_id" id="">
                            @foreach ($hotels as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">Date</label>
                        <input type="date" name="date" id="">
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
