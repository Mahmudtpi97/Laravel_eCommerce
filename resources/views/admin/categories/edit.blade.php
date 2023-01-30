@extends('layouts.admin_layouts')
@section('page_hero_title','Categories')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Update Category</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('update_categories', ['id' => $categories->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="title">Category Titel </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="title"  name="title" value="{{$categories->title}}">
                                <p class="help-block">Category Title Update</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="description">Category Description Update</label>
                            <div class="controls">
                                <textarea class="cleditor" id="description" name="description" row="10">{{$categories->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{route('categories')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>
@stop
