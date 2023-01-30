@extends('layouts.admin_layouts')
@section('page_hero_title','Categories')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Add Category</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('add_sub_categories.confirm')}}" method="POST">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="title">Sub Category Title </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="title"  name="title" value="{{old('title')}}">
                                <p class="help-block">Enter Sub Category Title</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Parent Category</label>
                            <div class="controls">
                              <select id="selectError3" name="category_id">
                                  <option value="">Select Category</option>
                                   @foreach ( $categories as $key =>$category)
                                         <option value="{{$key}}">{{$category}}</option>
                                   @endforeach
                              </select>
                              <p class="help-block">Selcet the Parent Category | Parent Category Must be Required </p>
                            </div>
                          </div>
                        <div class="control-group">
                            <label class="control-label" for="status">Sub Category Status</label>
                            <div class="controls cat_checkbox">
                                <input type="checkbox"  id="status"  name="status" value="1">
                                <p class="help-block">Click the checkbox and active the Sub Category </p>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{route('sub_categories')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>
@stop
