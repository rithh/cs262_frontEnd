@extends('layout.master')

@section('contents')
    <div class="container">
        <div class="ticket">
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            @foreach ($tpl_bus as $bus)
                <h1>Choose number of seats</h1>
                @if ($bus->seat_avail > 0)
                    <form class="form mt-3" action="{{ url('add_cart', $bus->id) }}" method="Post">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="number" name="booked" class="form-control" min="1"
                                placeholder="No. of Seat(s)">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Confirm Booking
                        </button>
                    </form>
                @else
                    <h1> Please choose a different bus</h1>
                @endif
            @endforeach
        </div>
    </div>
@endsection
