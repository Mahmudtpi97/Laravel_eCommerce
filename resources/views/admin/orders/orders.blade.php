@extends('layouts.admin_layouts')

@section('page_hero_title','orders')

@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span>All orders</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Quantity</th>
                      <th style="text-align: center">Total Price</th>
                      <th style="text-align: center">Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($orders  as  $order)

                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->users->name ?? 'User Unavilable'}}</td>
                        <td>{{Carbon\Carbon::parse($order->created_at)->format('d-M-Y | h:iA')}}</td>
                        <td>{{$order->quantity}}</td>
                        <td style="text-align: center">{{$order->total}} TK</td>
                        <td style="text-align: center">
                            @if ($order->status == 1)
                                <span class="label label-success center">Complete</span>
                            @else
                                <span class="label label-important">Pending</span>
                            @endif
                        </td>

                        <td class="center">
                            {{-- <form class="form-horizontal" action="{{route('orders.destroy',['order'=> $order->id ])}}" method="POST"> --}}
                                @if ($order->status == 1)
                                    <a class="btn btn-success" title="order Active" href="{{route('order_status_change',['order' => $order->id])}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                               @else
                                    <a class="btn label-important" title="order Unactive" href="{{route('order_status_change',['order' => $order->id])}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif

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
        </div>
    </div>

</div>

{{-- <div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>order Delete</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure? Delete Your order!</p>
    </div>
    <div class="modal-footer">
        <form action="{{ route('orders.destroy', ['order' => $orders->id]) }}" method="POST" style="margin: 0">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-primary">Delete</button>
        </form>
    </div>
</div> --}}


@stop
