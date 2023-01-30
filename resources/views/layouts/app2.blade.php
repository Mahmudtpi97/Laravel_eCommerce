@extends('layouts.front_main_area')
@section('main_area')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">@yield('hero_title')</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{url('/')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">@yield('hero_title')</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-fluid py-5">
            @if (Session('warning'))
                <div class="alert alert-danger">{{ Session('warning') }}</div>
            @endif
            @if (Session('message'))
                <div class="alert alert-success">{{ Session('message') }}</div>
            @endif

            @yield('content')
    </div>


@stop
