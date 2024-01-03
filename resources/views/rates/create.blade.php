@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADD Rate') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('rates.store') }}">
                        @csrf
                        <label for="">customer Name</label>
                        <select name="customer_id" id="" value="">
                            @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">Hotel Name</label>
                        <select name="hotel_id" id="" value="">
                            @foreach ($hotels as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">comment</label>
                        <input type="textarea" name="comment" id="" value="">
                        <br><br>
                        <label for="">star</label>
                        <input type="number" name="stare" id="" value="">
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
