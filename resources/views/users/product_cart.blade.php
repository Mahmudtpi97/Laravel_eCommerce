@extends('layouts.app2')
@section('content')
@section('hero_title','SHOPPING  Cart')

<div class="row px-xl-5">
    <div class="col-lg-8 table-responsive mb-5">
        <table class="table table-bordered text-center mb-0">
            <thead class="bg-secondary text-dark">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($cartItems as $item)
                {{-- @php
                  echo "<pre>";
                      print_r ($item['attributes']);
                  echo "</pre>";
                @endphp --}}
                <tr>
                    <td class="align-middle"><img src="{{asset($item['attributes'])}}" alt="" style="width: 50px;"> </td>
                    <td class="align-middle"> {{$item->name}}</td>
                    <td class="align-middle">{{$item->price}} TK</td>
                    <td class="align-middle">
                         <form action="{{url('update_to_cart',['id'=> $item->id] )}}" method="POST">
                            @csrf
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quantity" class="form-control form-control-sm bg-secondary text-center" value="{{$item->quantity}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                   </button>
                                </div>
                            </div>
                            {{-- <button  class="mt-3 btn btn-sm btn-primary "> Update</button> --}}
                         </form>

                    </td>
                    <td class="align-middle">{{ $item->quantity * $item->price}} TK</td>
                    <td class="align-middle"><a href="{{route('cart_delete',['id'=> $item->id] )}}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-4">
        <form class="mb-5" action="">
            <div class="input-group">
                <input type="text" class="form-control p-4" placeholder="Coupon Code">
                <div class="input-group-append">
                    <button class="btn btn-primary">Apply Coupon</button>
                </div>
            </div>
        </form>
        <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
                <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 pt-1">
                    <h6 class="font-weight-medium">Subtotal</h6>
                    <h6 class="font-weight-medium">{{ Cart::getSubTotal() }} TK</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="font-weight-medium">Shipping</h6>
                    {{-- <h6 class="font-weight-medium">{{$item->tax}}</h6> --}}
                </div>
            </div>
            <div class="card-footer border-secondary bg-transparent">
                <div class="d-flex justify-content-between mt-2">
                    <h5 class="font-weight-bold">Total</h5>
                    <h5 class="font-weight-bold">{{ Cart::getTotal() }} TK</h5>
                </div>
                @php
                        $user_id = Session::get('id');
                        // $product_id= Session::get('cart_id' );
                        // echo $product_id
                @endphp
                @if ($user_id != Null )
                      @if (\Cart::isEmpty())
                          <p class="text-danger">Please Add a One Product.</p>
                          <a href="{{URL('home')}}" class="btn btn-block btn-primary my-3 py-3">Go To Home</a>
                      @else
                         <a href="{{URL('checkout')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                      @endif
                 @else
                    <a href="{{URL('user_login')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
