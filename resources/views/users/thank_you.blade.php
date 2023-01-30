@extends('layouts.app2')
@section('content')
@section('hero_title', 'Thank You')
@php
   $order_id    = Session::get('order_id');
   $shipping_id = Session::get('shipping_id');
@endphp

@if ($order_id != Null)
    <div class="card-header bg-secondary border-0 text-center p-5">
        <h4 class="font-weight-semi-bold m-0 text-success">Your Order Successfully.</h4>
        <p class="font-weight-medium">Thank You For Your Order.</p>
    </div>
@else
    @if ($shipping_id == Null)
        <div class="card-header bg-secondary border-0 text-center p-5">
            <h4 class="font-weight-semi-bold m-0 text-success"> Your Cart Added Success. </h4>
            <h5 class="font-weight-medium text-danger">Please Confirm your Shipping Address and Payment</h5>
        </div>
    @endif

@endif

@stop
