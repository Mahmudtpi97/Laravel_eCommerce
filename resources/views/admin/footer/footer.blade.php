@extends('layouts.admin_layouts')

@section('page_hero_title','footers')
@section('admin_content')

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span>Footer Area</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Icon Name</th>
                      <th>Link</th>
                      <th style="text-align: center">Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($footer  as  $footer)
                    <tr>
                        <td>{{$footer->id}}</td>
                        <td><i class="{{$footer->icon}}">{{$footer->icon}}</i></td>
                        <td><a target="_blank" href="{{$footer->link}}">{{$footer->link}}</a></td>
                        <td style="text-align: center">
                            @if ($footer->status == 1)
                                <span class="label label-success center">Active</span>
                            @else
                                <span class="label label-important">UnActive</span>
                            @endif
                        </td>

                        <td class="center">
                            <form class="form-horizontal" action="{{route('footer_link_delete',['id'=> $footer->id ])}}" method="POST">
                                @if ($footer->status == 1)
                                    <a class="btn btn-success" title="footer Link Active" href="{{route('footer_status_change',['id' => $footer->id])}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                               @else
                                    <a class="btn label-important" title="footer Link Unactive" href="{{route('footer_status_change',['id' => $footer->id])}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif

                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure? Delete Your footer Link!')"  title="footer Link Delete" class="btn btn-danger" type="submit">
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
        <h3>footer Delete</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure? Delete Your footer!</p>
    </div>
    <div class="modal-footer">
        <form action="{{ route('footers.destroy', ['footer' => $footers->id]) }}" method="POST" style="margin: 0">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-primary">Delete</button>
        </form>
    </div>
</div> --}}


@stop
