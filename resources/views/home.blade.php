{{-- @extends('layouts.app') --}}
<style>
    .bn39 {
        background-image: linear-gradient(135deg, #008aff, #0318ff);
        border-radius: 6px;
        box-sizing: border-box;
        color: #ffffff;
        display: block;
        height: 50px;
        font-size: 1.4em;
        font-weight: 600;
        padding: 4px;
        text-decoration: none;
        width: 7em;
        z-index: 2;
    }

    .bn39:hover {
        color: #fff;
    }

    .bn39 .bn39span {
        align-items: center;
        background: #0e0e10;
        border-radius: 6px;
        display: flex;
        justify-content: center;
        height: 100%;
        transition: background 0.5s ease;
        width: 100%;
    }

    .bn39:hover .bn39span {
        background: transparent;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .card-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin: 20px;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 10px;
        width: 30%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .card-img {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card-img img {
        width: 100%;
        height: auto;
    }

    .card-info {
        padding: 10px;
    }

    .card-info h2 {
        margin: 0;
    }


    @media (max-width: 992px) {
        .card {
            width: 45%;
        }
    }

    @media (max-width: 768px) {
        .card {
            width: 100%;
        }
    }
</style>
@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    <h1 style="display: inline;margin-right:1000px"><b>Welcome Admin <span
                style="color: rgb(62, 62, 243)">{{ auth()->user()->name }}</span></b></h1>
    <div style="text-align:right;display: inline;">
        <a href="{{ route('profile', ['id' => auth()->user()->id]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle"
                viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg>
            Profile
        </a>
    </div>
@stop

@section('content')
    {{-- <p>Current User ID: {{ auth()->id() }}</p>

<button style="background-color: red;margin-bottom:25px;padding:10px;margin-left:5px"><a href=""
    style="color:white">Cancel a booking</a></button>
    <button style="background-color:rgba(84, 87, 81, 0.966) ;margin-bottom:25px;padding:10px;margin-left:5px"><a
        href="" style="color:white">edit a booking</a></button> --}}
    {{-- <br>
            <button style="background-color: rgb(51, 51, 51);margin-bottom:25px;margin-left:5px"><a href="">Show all
                Booking</a></button>
    <button style="background-color: rgb(51, 51, 51);margin-bottom:25px;margin-left:5px"><a href="">Show all
            Hotels</a></button>
    <button style="background-color: rgb(51, 51, 51);margin-bottom:25px;margin-left:5px"><a href="">Show all airline
            company</a></button>
    <button style="background-color: rgb(51, 51, 51);margin-bottom:25px;margin-left:5px"><a href="">Show all
            cities</a></button>
    <button style="background-color: rgb(51, 51, 51);margin-bottom:25px;margin-left:5px"><a href="">Show all
        tickets</a></button>
        <button style="background-color: rgb(51, 51, 51);margin-bottom:25px;margin-left:5px"><a href="">Show all
            reviews</a></button>
            <button style="background-color: rgb(51, 51, 51);margin-bottom:25px;margin-left:5px"><a href="">Show all
                customers</a></button> --}}
    <div class="" style="height: 80vh; overflow-y: scroll">
        <hr color="black">

        <br>
        <div class="hotel-side" style="width:100%;">
            <b>Top Rated Hotels :</b>
            <svg style="width: 30px;height: 30px;margin-left: 10px;color:rgb(62, 62, 243);"
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings"
                viewBox="0 0 16 16">
                <path
                    d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                <path
                    d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z" />
            </svg>
            <div class="card-container">
                <div class="card">
                    <div class="card-img">
                        <img src="https://images.bubbleup.com/width1920/quality35/mville2017/1-brand/1-margaritaville.com/gallery-media/220803-compasshotel-medford-pool-73868-1677873697.jpg" alt="Hotel 1">
                    </div>
                    <div class="card-info">
                        <h2>Hotel 1</h2>
                        <p>Rating: 4.5</p>
                        <p>Price: $200</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="city-side" style="width:100%;position: relative;">
            <b>most popular destinations :</b>
            <svg style="width:20px;height:20px;color:rgb(62, 62, 243);" xmlns="http://www.w3.org/2000/svg" width="16"
                height="16" fill="currentColor" class="bi bi-airplane-fill" viewBox="0 0 16 16">
                <path
                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849" />
            </svg>
            <svg style="width:20px;height:20px;color:rgb(62, 62, 243);" xmlns="http://www.w3.org/2000/svg" width="16"
                height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>
            <div class="card">
                <div class="card-img">
                    <img src="https://res.klook.com/image/upload/Mobile/City/swox6wjsl5ndvkv5jvum.jpg" alt="Hotel 3">
                </div>
                <div class="card-info">
                    <h2>Hotel 3</h2>
                    <p>Rating: 4.3</p>
                    <p>Price: $150</p>
                </div>
            </div>

        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock"
            viewBox="0 0 16 16">
            <path
                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
        </svg>


        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill"
            viewBox="0 0 16 16">
            <path
                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear"
            viewBox="0 0 16 16">
            <path
                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
            <path
                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width:30px">
            <path
                d="M20.505 7.5l-15.266.022.672.415-1.1-2.2a.75.75 0 0 0-.638-.414l-2.293-.1C.82 5.228-.003 6.06.003 7.083c.002.243.051.484.146.709l2.072 4.68a2.947 2.947 0 0 0 2.701 1.778h4.043l-.676-1.075-2.484 5.168A1.831 1.831 0 0 0 7.449 21h2.099a1.85 1.85 0 0 0 1.419-.664l5.165-6.363-.582.277h4.956c1.82.09 3.399-1.341 3.49-3.198l.004-.134a3.426 3.426 0 0 0-3.44-3.419l-.074.001zm.02 1.5h.042a1.924 1.924 0 0 1 1.933 1.914l-.002.065a1.866 1.866 0 0 1-1.955 1.772l-4.993-.001a.75.75 0 0 0-.582.277l-5.16 6.355a.346.346 0 0 1-.26.118h-2.1a.336.336 0 0 1-.3-.49l2.493-5.185a.75.75 0 0 0-.676-1.075H4.924a1.45 1.45 0 0 1-1.328-.878l-2.07-4.676a.35.35 0 0 1 .326-.474l2.255.1-.638-.415 1.1 2.2a.75.75 0 0 0 .672.415L20.507 9zM16.323 7.76l-2.992-4.02A1.851 1.851 0 0 0 11.85 3H9.783a1.85 1.85 0 0 0-1.654 2.672l1.439 2.91a.75.75 0 0 0 1.344-.664L9.472 5.007a.351.351 0 0 1 .312-.507h2.066a.35.35 0 0 1 .279.14l2.99 4.017a.75.75 0 1 0 1.203-.896z">
            </path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
            <path fill-rule="evenodd"
                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg>
        <div style="">
            <a class="bn39" href="{{route('record.create')}}"><span class="bn39span">Add Booking</span></a>
        </div>


    </div>
@stop
@section('footer')
@stop
@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop


@section('js')
    <script>
        console.log('Hi!');
    </script>

@stop

{{-- <button style="background-color: rgb(62, 62, 243);padding:10px;margin-left:5px;border-block-end-style:none;width:250px">
    <a style="color:white">Add a new booking</a>
</button> --}}
