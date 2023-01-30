@extends('layouts.admin_layouts')

@section('page_hero_link',url('orders') )
@section('page_hero_title','orders')

@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span5">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span>User Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
              <tbody>
                    <tr>
                        <th>Name: </th>
                        <td>{{$orders->users->name}}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{$orders->users->email}}</td>
                    </tr>
                    <tr>
                        <th>Number: </th>
                        <td>{{$orders->users->number}}</td>
                    </tr>
              </tbody>
          </table>
        </div>
    </div>
    <div class="box span7">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span>Shipping  Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
              <tbody>
                    <tr>
                        <th>Shipper Name: </th>
                        <td>{{$orders->shipping->first_name.' '.$orders->shipping->last_name}}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{$orders->shipping->email}}</td>
                    </tr>
                    <tr>
                        <th>Number: </th>
                        <td>{{$orders->shipping->number}}</td>
                    </tr>
                    <tr>
                        <th>Zip Code: </th>
                        <td>{{$orders->shipping->zip_code}}</td>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <td>{{$orders->shipping->address}}</td>
                    </tr>
              </tbody>
            </table>
        </div>
    </div>

</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span> Orders Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Quantity</th>
                        <th style="text-align: center">Total Price</th>
                        <th style="text-align: center">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as  $order)
                        @php
                            $total =$order->product_quantity * $order->product_price;
                        @endphp
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->product_name ?? 'User Unavilable'}}</td>
                            <td>{{$order->product_quantity}}</td>
                            <td style="text-align: center">{{$order->product_price}} TK</td>
                            <td style="text-align: center">{{$total}} TK</td>
                            <td style="text-align: center">
                                @if ($order->orders->status == 1)
                                    <span class="label label-success center">Complete</span>
                                @else
                                    <span class="label label-important">Pending</span>
                                @endif
                            </td>

                            <td class="center">
                                {{-- <form class="form-horizontal" action="{{route('orders.destroy',['order'=> $order->id ])}}" method="POST"> --}}
                                    {{-- @if ($order->status == 1) --}}
                                        {{-- <a class="btn btn-success" title="order Active" href="{{route('order_status_change',['order' => $order->id])}}"> --}}
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                   {{-- @else --}}
                                        {{-- <a class="btn label-important" title="order Unactive" href="{{route('order_status_change',['order' => $order->id])}}"> --}}
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    {{-- @endif --}}

                                    <a class="btn btn-info" title="order View" href="{{route('orders_view',['id' => $order->id])}}">
                                        <i class="halflings-icon white eye-open"></i>
                                    </a>
                                    {{-- <a class="btn btn-primary" title="order Edit" href="{{route('orders.edit',['order' => $order->id])}}"> --}}
                                        <i class="halflings-icon white edit"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure? Delete Your order!')"  title="order Delete" class="btn btn-danger btn-setting" type="submit">
                                        <i class="halflings-icon white trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                  </tbody>

            </table>
            <div class="form-actions">
                <a href="{{url('admin/orders')}}" class="btn btn-danger" style="margin-right: 2rem">Back to Orders</a>
            </div>
        </div>
    </div>

</div>


@stop
