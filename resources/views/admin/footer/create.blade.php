@extends('layouts.admin_layouts')
@section('page_hero_title','Footer')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Footer Item</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('create_footer')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="f_logo">Footer Logo</label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" id="f_logo"  name="f_logo" value="{{old('f_logo')}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="description">Description</label>
                                <div class="controls">
                                    <textarea type="text" class="span6 typeahead" id="description"  name="description" value="{{old('description')}}"> </textarea>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="address">Address</label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" id="address"  name="address" value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mail">Mail</label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" id="mail"  name="mail" value="{{old('mail')}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="number">Number</label>
                                <div class="controls">
                                    <input type="text" class="span6 typeahead" id="number"  name="number" value="{{old('number')}}">
                                </div>
                            </div>

                            <div class="form-actions">
                                <a href="{{url('admin/footer')}}" class="btn btn-danger" style="margin-right: 2rem">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </fieldset>
                </form>

            </div>
        </div>

    </div>
@stop

