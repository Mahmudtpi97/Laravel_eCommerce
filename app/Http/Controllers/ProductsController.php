<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $this->data['products'] = Product::all();
        return view('admin.products.products',$this->data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories']     = Category::arrayByCategory();
        $this->data['subCategories']  = SubCategory::arrayBySubCategory();
        return view('admin.products.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductsRequest $request)
    {
            $formData = $request->all();
            // Image Upload
            $imgData = $request->file('product_img');
            $imgName = date('Y-m-d-H-i-s_').'_'.$imgData->getClientOriginalName();
            $imgPath   = $imgData->move('storage/images/products',$imgName);
            $formData['product_img'] = asset($imgPath);

       if (Product::create($formData)) {
           Session::flash('message','Product Create Successfully!');
       }
       return redirect()->to('admin/products')  ;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['products'] = Product::findOrFail($id);
        return view('admin.products.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['categories']       = Category::arrayByCategory();
        $this->data['subCategories']    = SubCategory::arrayBySubCategory();
        $this->data['products']         = Product::findOrFail($id);
        return view('admin.products.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data= $request->all();
         $formData = Product::findOrFail($id);

         $formData->category_id         = $data['category_id'];
         $formData->sub_category_id     = $data['sub_category_id'];
         $formData->product_title       = $data['product_title'];
         $formData->current_price       = $data['current_price'];
         $formData->old_price           = $data['old_price'];
         $formData->product_color       = $data['product_color'];
         $formData->product_short_des   = $data['product_short_des'];
         $formData->product_description = $data['product_description'];

        // Image Update
        $imgData = $request->file('product_img');
        $imgName = date('Y-m-d-H-i-s_').'_'.$imgData->getClientOriginalName();
        $imgPath = $imgData->move('storage/images/products',$imgName);

        // $old_img  = $formData['product_img'];
        // if ($old_img !=null)
            // {
                // unlink($old_img);
            // };
        $formData['product_img'] = asset($imgPath);

         if ($formData->save()) {
            Session::flash('message','Product Updated Successfully!');
        }
        return redirect()->to('admin/products');

    }

//   Product Active and InActive
    // public function active_product($id){
    //     $formData      = Product::findOrFail($id);
    //     $formData->status = 0;

    //     if ($formData->save()) {
    //         Session::flash('message','Product InActive Successfully !');
    //     }
    //     return redirect()->to('admin/products');
    // }


    public function product_status_change(Product $product){
        if ($product->status==1) {
            $product->update(['status'=> 0]);
            Session::flash('message','Product InActive Successfully !');
        }
        else{
            $product->update(['status'=> 1]);
            Session::flash('message','Product Active Successfully !');
        }
        return redirect()->to('admin/products');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_dlt = Product::findOrFail($id);
        if ($product_dlt->delete()) {
            Session::flash('message','Product Deleted Successfully!');
        }
        return redirect()->to('admin/products');
    }

    function getProductList(){
        $list = Product::get();
        return response()->json($list, 200);
    }
}
