@extends('layouts.app2')
@section('content')
@section('hero_title','Checkout')

@php
   $user_id = Session::get('id');
@endphp

{{-- <h5>{{$c_id }} aaa</h5> --}}
{{-- @if ($c_id != Null ) --}}

<!-- Checkout Start -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{url('shipping')}}" method="POST">
    @csrf
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Shipping  Address</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" type="text" id="first_name" name="first_name" placeholder="Mahmudul" value="{{old('first_name')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="last_name">Last Name</label>
                        <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Hasan" value="{{old('last_name')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email" placeholder="example@email.com" value="{{old('email')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="number">Mobile No</label>
                        <input class="form-control" type="text" id="number" name="number" placeholder="+123 456 789" value="{{old('number')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" id="address" name="address" placeholder="Ambari, Chirirbandar" value="{{old('address')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="city">City</label>
                        <input class="form-control" type="text" id="city" name="city" placeholder="Dinajpur" value="{{old('city')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="state">State</label>
                        <input class="form-control" type="text" id="state" name="state" placeholder="Rangpur" value="{{old('state')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="country">Country</label>
                        {{-- <select class="custom-select" id="country" name="country">
                            <option selected="">United States</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                        </select> --}}
                        <input class="form-control" type="text" id="country" name="country" placeholder="Bangladesh" value="{{old('country')}}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="zip_code">ZIP Code</label>
                        <input class="form-control" type="text" id="zip_code" name="zip_code" placeholder="123" value="{{old('zip_code')}}">
                    </div>
                    <!-- <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="newaccount">
                            <label class="custom-control-label" for="newaccount">Create an account</label>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- <div class="collapse mb-4" id="shipping-address">
                <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" placeholder="John">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" placeholder="Doe">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="example@email.com">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" placeholder="+123 456 789">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select class="custom-select">
                            <option selected="">United States</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <input class="form-control" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" placeholder="123">
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    {{-- @php
                        print_r ($cat =  \Cart::getContent('name'));
                    @endphp
                    @if ($cat ==null)
                    <p class="text-alert">Cart no Add.</p>

                @else  --}}

                    @foreach ($cartItems as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{$item->name}}</p>
                                <p>{{$item->quantity * $item->price}}</p>
                            </div>
                        @endforeach

                    {{-- @endif --}}


                    <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">{{ Cart::getSubTotal() }} TK</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">Free</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{ Cart::getTotal() }} TK</h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment_method" id="hand_cash" value="hand_cash">
                            <label class="custom-control-label" for="hand_cash">Hand Cash</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment_method" id="bkash" value="bkash">
                            <label class="custom-control-label" for="bkash">Bkhas</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment_method" id="bank_transfer" value="bank_transfer">
                            <label class="custom-control-label" for="bank_transfer">Bank Transfer</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>

                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Checkout End -->
{{-- @else
   @php
      return redirect()->route('user_login');
   @endphp --}}
{{-- @endif --}}

@stop
