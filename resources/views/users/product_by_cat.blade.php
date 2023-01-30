@extends('layouts.app2')
@section('content')
@section('hero_title','Category by Product')

<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Category by Product</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <!--Active Cat by Product Condition -->
        @if(count($products)>0)
         @foreach($products as $product)

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{asset($product->product_img)}}" alt="product_img">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$product->product_title}}</h6>
                        <div class="d-dlock">
                            <div class="d-flex justify-content-center"> <h6>${{$product->current_price}}</h6><h6 class="text-muted ml-2"> <mark><del>${{$product->old_price}}</del></mark> </h6> </div>
                            <div class="d-flex justify-content-center mt-1">
                                <a class="text-danger ml-2" href="{{route('product_by_cat',['id'=>$product->categories->id] )}}"> {{$product->categories->title}}</a>
                                <a class="text-danger ml-2"href="{{route('product_by_sub_cat',['id'=>$product->subCategories->id] )}}">{{$product->subCategories->title}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{url('product_details',['id'=> $product->id] )}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
         @endforeach
         @else
        <h2 class="text-center h3 w-100 mt-2 text-danger">Product Not Avilable</h2>
        @endif
    </div>
</div>
<!-- Products End -->


<!-- Vendor Start -->
{{-- <div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="vendor-item border p-4">
                    <img src="{{asset('frontend/assets/img/vendor-1.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('frontend/assets/img/vendor-2.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('frontend/assets/img/vendor-3.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('frontend/assets/img/vendor-4.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('frontend/assets/img/vendor-5.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('frontend/assets/img/vendor-6.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('frontend/assets/img/vendor-7.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('frontend/assets/img/vendor-8.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Vendor End -->
@stop
