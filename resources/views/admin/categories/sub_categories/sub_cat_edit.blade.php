@extends('layouts.admin_layouts')
@section('page_hero_title','Categories')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Update Category</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('sub_categories.update', ['id' => $sub_category->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="title">Category Titel </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="title"  name="title" value="{{$sub_category->title}}">
                                <p class="help-block">Sub Category Title Update</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Parent Category</label>
                            <div class="controls">
                              <select id="selectError3" name="category_id">
                                  <option value="{{$sub_category->category_id}}">{{$sub_category->categories->title ?? 'Category Unavilable'}}</option>

                                   @foreach ( $categories as $key =>$category)
                                         <option value="{{$key}}">{{$category}}</option>
                                   @endforeach

                              </select>
                              <p class="help-block">Parent Category Update | Parent Category Must be Required</p>
                            </div>
                          </div>
                        <div class="form-actions">
                            <a href="{{route('sub_categories')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div>
@stop
