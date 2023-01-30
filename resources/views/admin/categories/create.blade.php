@extends('layouts.admin_layouts')
@section('page_hero_title','Categories')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Add Category</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('add_categories.confirm')}}" method="POST">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="title">Category Titel </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="title"  name="title" value="{{old('title')}}">
                                <p class="help-block">Enter Category Title</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="description">Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="description" name="description" >{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="status">Category Status</label>
                            <div class="controls cat_checkbox">
                                <input type="checkbox"  id="status"  name="status" value="1">
                                <p class="help-block">Click the checkbox and active the product </p>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{route('categories')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>
@stop
