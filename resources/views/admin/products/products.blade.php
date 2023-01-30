@extends('layouts.admin_layouts')

@section('page_hero_title','Products')

@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span>All Products</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Short Des:</th>
                      <th>Price</th>
                      <th>Size</th>
                      <th>Image</th>
                      <th style="text-align: center">Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($products  as  $product)

                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_title ?? 'Product Unavilable'}}</td>
                        <td>{{$product->categories->title ?? 'Category Unavilable'}}</td>
                        <td>{{$product->product_short_des}}</td>
                        <td>{{$product->current_price}}</td>
                        <td>{{$product->product_size}}</td>
                        <td><img src="{{asset($product->product_img)}}" alt="product_img" style="width: 50px; height:50px; "></td>
                        <td style="text-align: center">
                            @if ($product->status == 1)
                                <span class="label label-success center">Active</span>
                            @else
                                <span class="label label-important">UnActive</span>
                            @endif
                        </td>

                        <td class="center">
                            <form class="form-horizontal" action="{{route('products.destroy',['product'=> $product->id ])}}" method="POST">
                                @if ($product->status == 1)
                                    <a class="btn btn-success" title="Product Active" href="{{route('product_status_change',['product' => $product->id])}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                               @else
                                    <a class="btn label-important" title="Product Unactive" href="{{route('product_status_change',['product' => $product->id])}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif

                                <a class="btn btn-info" title="Product View" href="{{route('products.show',['product' => $product->id])}}">
                                    <i class="halflings-icon white eye-open"></i>
                                </a>
                                <a class="btn btn-primary" title="Product Edit" href="{{route('products.edit',['product' => $product->id])}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>

                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure? Delete Your Product!')"  title="Product Delete" class="btn btn-danger btn-setting" type="submit">
                                    <i class="halflings-icon white trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

              </tbody>
          </table>
        </div>
    </div>

</div>

{{-- <div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Product Delete</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure? Delete Your Product!</p>
    </div>
    <div class="modal-footer">
        <form action="{{ route('products.destroy', ['product' => $products->id]) }}" method="POST" style="margin: 0">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-primary">Delete</button>
        </form>
    </div>
</div> --}}


@stop
