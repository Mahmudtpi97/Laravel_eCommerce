@extends('layouts.admin_layouts')

@section('page_hero_title','Categories')

@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="icon-list"></i><span class="break"></span>All Sub Categories</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Sub Category</th>
                      <th>Parent Category</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($sub_category  as $key=> $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->categories->title ?? 'Category Unavilable' }}</td>
                        <td>{{$category->created_at->format('Y-m-d')}}</td>
                        <td style="text-align: center">
                            @if ($category->status == 1)
                                <span class="label label-success center">Active</span>
                            @else
                                <span class="label label-important">UnActive</span>
                            @endif
                        </td>
                        <td class="center">
                                @if ($category->status == 1)
                                    <a class="btn btn-success" title="Category Status Active" href="{{route('sub_cat_status_change',['id' => $category->id])}}" >
                                        <i class="halflings-icon white thumbs-up"></i>
                               @else
                                    <a class="btn label-important" title="Category Status Unactive" href="{{route('sub_cat_status_change',['id' => $category->id])}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif
                                <a class="btn btn-primary" title="Category Edit" href="{{route('sub_categories.edit',['id' => $category->id])}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure? Delete Your Sub Category!')" title="Category Delete" class="btn btn-danger btn-setting" type="submit">
                                    <i class="halflings-icon white trash"></i>
                                </button>
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
        <p>Are you sure? Delete Your Sub Category!</p>
    </div>
    <div class="modal-footer">
        <form action="{{ route('sub_categories_delete', ['id' => $sub_category->id] ) }}" method="POST" style="margin: 0">
               <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-primary">Delete</button>
        </form>
    </div>
</div> --}}


@stop
