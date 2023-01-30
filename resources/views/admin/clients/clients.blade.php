@extends('layouts.admin_layouts')

@section('page_hero_link','client')
@section('page_hero_title','clients')

@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span>All Clients</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th style="text-align: center">Image</th>
                      <th style="text-align: center">Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($clients  as $client)
                    <tr>
                        <td style="text-align: center"><img src="{{$client->client_img}}" alt="client_img" style="width: 150px; height:auto;"></td>
                        <td style="text-align: center">{{$client->created_at->format('Y-m-d')}}</td>
                        <td style="text-align: center">
                            @if ($client->status == 1)
                                <span class="label label-success center">Active</span>
                            @else
                                <span class="label label-important">UnActive</span>
                            @endif
                        </td>
                        <td class="center">
                             <form action="{{ route('clients.destroy',['client' => $client->id]) }}" method="post" style="margin: 0">
                                    @if ($client->status == 1)
                                        <a class="btn btn-success" title="Category Status Active" href="{{route('clients_status_change',['client' => $client->id])}}" >
                                            <i class="halflings-icon white thumbs-up"></i>
                                  @else
                                        <a class="btn label-important" title="Category Status Unactive" href="{{route('clients_status_change',['client' => $client->id])}}">
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-primary" title="Category Edit" href="{{route('clients.edit',['client' => $client->id])}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>

                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure? Delete Your Category!')" title="Category Delete" class="btn btn-danger " type="submit">
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
            <h3>Category Delete</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure? Delete Your Category!</p>
        </div>
        <div class="modal-footer">
            <form action="{{ route('delete_categories', ['category' => $category->id]) }}" method="post" style="margin: 0">
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                    @csrf
                    @method('delete')
                <button class="btn btn-primary">Delete</button>
            </form>
        </div>
 </div> --}}


@stop
