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
                                <span class="label label-important">Pending</span>
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
