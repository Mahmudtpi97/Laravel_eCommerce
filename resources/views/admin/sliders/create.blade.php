@extends('layouts.admin_layouts')
@section('page_hero_title','Sliders')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Add Slider</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('sliders.store')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="title">Slider Title </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="title"  name="title" value="{{old('title')}}">
                                <p class="help-block">Enter Slider Title</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="sub_title">Slider Sub Title </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="sub_title"  name="sub_title" value="{{old('sub_title')}}">
                                <p class="help-block">Enter Slider Title</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="btn_title">Slider Btn Title </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="btn_title"  name="btn_title" value="{{old('btn_title')}}">
                                <p class="help-block">Enter Slider Title</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="my-editor">Slider Image </label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" id="slider_img"  name="slider_img" value="{{old('slider_img')}}">
                                {{-- <textarea type="file" id="my-editor" name="slider_img" class="form-control">{!! old('content', 'test editor content') !!} </textarea> --}}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="status">Slider Status</label>
                            <div class="controls cat_checkbox">
                                <input type="checkbox"  id="status"  name="status" value="1">
                                <p class="help-block">Click the checkbox and active the Slider </p>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{url('admin/sliders')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>
    @section('js')
        <script>
            CKEDITOR.replace('my-editor', options);
        </script>
    @stop
@stop
