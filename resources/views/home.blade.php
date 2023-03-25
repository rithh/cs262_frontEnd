<?php

use App\Http\Controllers\PageController;
use App\Models\Bus;
?>
@extends('layout.master')
@include('layout.slider')
@section('contents')
    <div class="container">
        <div class="search">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-4">
                        <span><img src="{{ asset('assets/images/pipay.png') }}"></span>
                        <span><img src="{{ asset('assets/images/aba_pay.png') }}"></span>
                        <span><img src="{{ asset('assets/images/chipmongpay.png') }}"></span>
                        <span><img src="{{ asset('assets/images/wing.png') }}"></span>
                        <span><img src="{{ asset('assets/images/Visa.png') }}"></span>
                        <span><img src="{{ asset('assets/images/Mastercard.png') }}"></span>
                        <span><img src="{{ asset('assets/images/unionpay.png') }}"></span>
                    </div>
                    <div class="col d-none d-sm-none d-md-none d-lg-block">
                        <div class="text-right">
                            <span>
                                Experience the best way to book your tickets
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-md-3">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" name="depart" list="location-depart"
                                placeholder="Choose a destination" aria-label="Search">
                            <datalist id="location-depart">
                                <option value="Phnom Penh">
                                <option value="Siem Reap">
                                <option value="Sihanouk Ville">
                            </datalist>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <button class="ex-btn">
                            <span class="iconify" data-icon="fa:exchange"></span>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control mr-sm-2" type="search" name="arrive" list="location-arrive"
                            placeholder="Choose a destination" aria-label="Search">
                        <datalist id="location-arrive">
                            <option value="Phnom Penh">
                            <option value="Siem Reap">
                            <option value="Sihanouk Ville">
                            <option value="Poipet">
                        </datalist>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control mr-sm-2" placeholder="28/02/2023" disabled
                            style="background-color: #cccccc; color:white">
                    </div>
                    <div class="col-md-2 col-sm-12 mb-4 mb-md-4">
                        <button class="search-btn">
                            <span class="iconify" data-icon="ic:baseline-search"></span>Search
                        </button>
                    </div>
                </div>
            </div>
            <div class="col col-sort">
                <div class="row">
                    <div class="col-1">
                        <button class="sort-btn">
                            <a href="/">Earliest</a>
                        </button>
                    </div>
                    <div class="col-1">
                        <button class="sort-btn">
                            <a href="/home_fastest">Fastest</a>
                        </button>
                    </div>
                    <div class="col-1">
                        <button class="sort-btn">
                            <a href="/home_cheapest">Cheapest</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="tickets-contents">
            @foreach ($tpl_bus as $bus)
                <div class="row my-4">
                    <div class="col-2">
                        <div class="op-content mt-sm-2">
                            <div class="row-pic">
                                <img class="img-responsive" src="{{ asset('assets/images') }}/{{ $bus->op_logo }}"
                                    alt="{{ $bus->op_name }}">
                            </div>
                            <div class="row-title">
                                <a href="#">{{ $bus->op_name }}</a>
                            </div>
                            <div class="row-review">
                                <a href="#">{{ $bus->op_review }} Reviews</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="row">
                            <div class="col-5">
                                <div class="left-col mt-2">
                                    <span class="dept">Departure: </span>
                                    <span class="dest">{{ $bus->depart_from }}</span>
                                    <div class="time mt-2">
                                        <span>
                                            {{ $bus->depart_time }}
                                        </span>
                                    </div>
                                    <div class="board mt-2">
                                        <span class="iconify" data-icon="material-symbols:location-on"></span>
                                        <a href="#">Boarding Point</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="duration mt-4">
                                    <span>{{ $bus->time_diff }}H
                                        (Direct)
                                    </span>
                                </div>
                                <hr class="img">
                                <div class="info">
                                    <span class="iconify" data-icon="heroicons:exclaimation-triangle-solid"></span>
                                    <a href="#">Trip info</a>
                                </div>

                            </div>
                            <div class="col-5">
                                <div class="right-col mt-2">
                                    <span class="dept">Arrival: </span>
                                    <span class="dest">{{ $bus->arrive_at }}</span>
                                    <div class="time mt-2">
                                        <span>{{ $bus->arrive_time }}</span>
                                    </div>
                                    <div class="board mt-2">
                                        <span class="iconify" data-icon="material-symbols:location-on"></span>
                                        <a href="#">Dropoff Point</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row-price">
                            <p class="mt-1">USD {{ $bus->price }}</p>
                        </div>
                        <div class="row-seat">
                            <p>Seat Available : {{ $bus->seat_avail }}</p>
                        </div>
                        <a href="./ticket_detail/{{ $bus->id }}">
                            <div class="row-btn">
                                <button type="button" class="btn btn-primary">
                                    Book Now
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
