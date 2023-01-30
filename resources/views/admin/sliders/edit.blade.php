@extends('layouts.admin_layouts')
@section('page_hero_title','Sliders')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Update Slider</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('sliders.update', ['slider' => $sliders->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="title">Slider Title </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="title"  name="title" value="{{$sliders->title}}">
                                <p class="help-block">Enter Slider Title</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="sub_title">Slider Sub Title </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="sub_title"  name="sub_title" value="{{$sliders->sub_title}}">
                                <p class="help-block">Enter Slider Title</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="btn_title">Slider Btn Title </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="btn_title"  name="btn_title" value="{{$sliders->btn_title}}">
                                <p class="help-block">Enter Slider Title</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="slider_img">Slider Image </label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" id="slider_img"  name="slider_img" value="{{$sliders->slider_img}}">
                                {{-- <textarea type="file" id="my-editor" name="slider_img" class="form-control">{!! old('content', 'test editor content') !!} </textarea> --}}
                                <img src="{{asset($sliders->slider_img)}}" alt="slider_img" style="width:100px; height:auto;display:block;">
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{url('admin/sliders')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>
@stop
