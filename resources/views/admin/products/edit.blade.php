@extends('layouts.admin_layouts')
@section('page_hero_title','Products')
@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Update Product</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('products.update',['product'=> $products->id ])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Product Category</label>
                            <div class="controls">
                              <select id="selectError3" name="category_id">
                                  <option value="{{$products->categories->id ?? 'Category Unavilable'}}">{{$products->categories->title ?? 'Select Category'}}</option>
                                   @foreach ( $categories as $key =>$category)
                                         <option value="{{$key}}">{{$category}}</option>
                                   @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="selectError3">Product Sub Category</label>
                            <div class="controls">
                              <select id="selectError3" name="sub_category_id">
                                  <option value="{{$products->subCategories->id ?? 'Sub Category Unavilable'}}">{{$products->subCategories->title ?? 'Select Sub Category'}}</option>
                                   @foreach ( $subCategories as $key =>$subCat)
                                         <option value="{{$key}}">{{$subCat}}</option>
                                   @endforeach
                              </select>
                            </div>
                          </div>
                        <div class="control-group">
                            <label class="control-label" for="product_title">Product Titel </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="product_title"  name="product_title" value="{{$products->product_title}}">
                                <p class="help-block">Enter Product Title</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="current_price">Product Price </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="current_price"  name="current_price" value="{{$products->current_price}}">
                                <p class="help-block">Enter Product Current Price</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="old_price">Product Old Price </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="old_price"  name="old_price" value="{{$products->old_price}}">
                                <p class="help-block">Enter Product Old Price</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="product_size">Product Size </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="product_size"  name="product_size" value="{{$products->product_size}}">
                                <p class="help-block">Enter Product Size</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="product_color">Product Color </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="product_color"  name="product_color" value="{{$products->product_color}}">
                                <p class="help-block">Enter Product Color</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="product_short_des">Product Short Description</label>
                            <div class="controls">
                                <textarea  id="product_short_des" name="product_short_des" >{{$products->product_short_des}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="product_description">Product Long Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="product_description" name="product_description" >{{$products->product_description}}</textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="product_img">Product Image </label>
                            <div class="controls">
                                <input type="file" class="span6 typeahead" id="product_img"  name="product_img" value="{{$products->product_img}}">
                                <img src="{{asset($products->product_img)}}" alt="product_img" style="width:100px; height:auto;display:block;">
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{url('admin/products')}}" class="btn btn-danger" style="margin-right: 2rem">Cancle</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>

    </div>
@stop
