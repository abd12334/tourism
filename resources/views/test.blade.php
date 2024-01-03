@foreach($topRatedHotels as $hotel)
    <div>
        <h2>{{ $hotel->name }}</h2>
        <h2>{{ $hotel->cities }}</h2>
        <p>Rate: {{ $hotel->rates->avg('stare') }}</p>
    </div>
@endforeach
