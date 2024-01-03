@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDIT Booking') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bookings.update',['booking'=>$booking->id]) }}">
                        @csrf
                        <label for="">customer Name</label>
                        <select name="customer_id" id="" value="{{$booking->customer->name}}">
                            @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">ticket date</label>
                        <select name="ticket_id" id="" value="{{$booking->ticket->date_s}}">
                            @foreach ($tickets as $ticket)
                            <option value="{{$ticket->id}}">{{$ticket->date_s}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">Hotel Name</label>
                        <select name="hotel_id" id="" value="{{$booking->hotel->name}}">
                            @foreach ($hotels as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">Date</label>
                        <input type="date" name="date" id="" value="{{$booking->date}}">
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('EDIT') }}
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
