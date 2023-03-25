@extends('layout.master')

@section('contents')
    <div class="container">
        <div class="ticket">
            @forelse ($tpl_admin as $admin)
                <div class="row mt-3">
                    <h1>Booked Trips</h1>

                    <div class="col-12">
                        <hr style="color:#ed5d23; height:5px">
                        <p>Direction : {{ $admin->depart_from }} to {{ $admin->arrive_at }}</p>
                        <hr>
                        <p>Departure : February 28, 2023 {{ $admin->depart_time }}</p>
                        <hr>
                        <p>Operator : {{ $admin->op_name }}</p>
                        <hr style="height:0.5px">
                        <p>Type : VIP Van</p>
                        <hr style="height:0.5px">
                        <p># of passenger(s) : {{ $admin->booked_seats }}</p>
                        <hr style="height:0.5px">
                        <p>Total : USD {{ $admin->total }}</p>
                        <hr style="height:0.5px">
                        <p>Booked on : {{ $admin->created_at }}</p>
                        <hr style="color:#ed5d23; height:5px">
                    </div>
                </div>
            @empty
                <h1>No bookings found</h1>
            @endforelse
        </div>
    </div>
@stop
