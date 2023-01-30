@extends('layouts.admin_layouts')
@section('page_hero_title','Products')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Add Product</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('create_link')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="icon">Social Icon Name:</label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" id="icon"  name="icon" value="{{old('icon')}}">
                                    <p class="help-block">Ex: <mark>fab fa-facebook-f</mark></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="link">Social Link:</label>
                                <div class="controls">
                                    <input type="url" class="span6 typeahead" id="link"  name="link" value="{{old('link')}}">
                                    <p class="help-block">Ex: <mark>https://www.facebook.com</mark></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="status">Social Status</label>
                                <div class="controls cat_checkbox">
                                    <input type="checkbox"  id="status"  name="status" value="1">
                                    <p class="help-block">Click the checkbox and active the product </p>
                                </div>
                            </div>

                            <div class="form-actions">
                                <a href="{{url('admin/social_link')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </fieldset>
                </form>

            </div>
        </div>

    </div>
@stop

