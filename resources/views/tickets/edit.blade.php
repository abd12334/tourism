@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDIT Ticket') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tickets.update',['ticket' =>$ticket->id]) }}">
                        @csrf
                        <label for="">company name</label>
                        <select name="company_id" id="" value="">
                            @foreach ($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">City Name</label>
                        <select name="city_id" id="" value="">
                            @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="">date_s</label>
                        <input type="date" name="date_s" id="" value="{{$ticket->date_s}}">
                        <br><br>
                        <label for="">date_e</label>
                        <input type="date" name="date_e" id="" value="{{$ticket->date_e}}">
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
