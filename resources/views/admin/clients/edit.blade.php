@extends('layouts.admin_layouts')
@section('page_hero_title','Sliders')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Update Category</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('clients.update', ['client' => $clients->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="my-editor">Client Image </label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" id="client_img"  name="client_img" value="{{$clients->client_img}}">
                                {{-- <textarea type="file" id="my-editor" name="slider_img" class="form-control">{!! old('content', 'test editor content') !!} </textarea> --}}
                                <img src="{{asset($clients->client_img)}}" alt="client_img" style="width:100px; height:auto;display:block;">
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{url('admin/clients')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>
@stop
