@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >{{ __('EDIT Rate') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rates.update',['rate'=>$rate->id]) }}">
                        @csrf
                        <label for="">customer Name</label>
                        <select name="customer_id" id="" value="{{$rate->customer->name}}">
                            @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">Hotel Name</label>
                        <select name="hotel_id" id="" value="{{$rate->hotel->name}}">
                            @foreach ($hotels as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">comment</label>
                        <input type="textarea" name="comment" id="" value="{{$rate->comment}}">
                        <br><br>
                        <label for="">star</label>
                        <input type="number" name="stare" id="" value="{{$rate->stare}}">
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
