@extends('layouts.admin_layouts')

@section('page_hero_link',url('products') )
@section('page_hero_title','Products')

@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span>{{$products->product_title}} Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
              <tbody>
                    <tr>
                        <th>Old Price</th>
                        <td>{{$products->old_price}}</td>
                    </tr>
                    <tr>
                        <th>Color</th>
                        <td>{{$products->product_color}}</td>
                    </tr>
                    <tr>
                        <th>Created Date</th>
                        <td>{{$products->created_at->format('Y-m-d')}}</td>
                    </tr>
                    <tr>
                        <th>Product Sub Category</th>
                        <td>{{$products->subCategories->title ?? 'No Sub Category'}}</td>
                    </tr>
                    <tr>
                        <th>Desecription</th>
                        <td>{{$products->product_size}}</td>
                    </tr>
                    <tr>
                        <th>Full Image</th>
                        <td><img src="{{asset($products->product_img)}}" alt="product_img" style="width: 150px; height:auto; "></td>
                    </tr>
              </tbody>
          </table>
          <div class="form-actions">
            <a href="{{url('admin/products')}}" class="btn btn-danger" style="margin-right: 2rem">Back to Product</a>
        </div>
        </div>
    </div>

</div>


@stop
