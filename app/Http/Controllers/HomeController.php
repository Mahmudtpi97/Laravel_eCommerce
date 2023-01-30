<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['cat_active']    = 'home_cat';
    }

    public function index(){
        $this->data['socials']          = Social::all()->where('status',1);
        $this->data['categories']       = Category::with('SubCategory')->where('status',1)->get();
        $this->data['products']         = Product::where('status',1)->limit(9)->get();
        $this->data['sliders']          = Slider::all()->where('status',1)->take(3);
        $this->data['clients']          = Client::all()->where('status',1)->take(5);
        $this->data['cartItems']        = \Cart::getContent();

        return view('users.index',$this->data);
    }

    public function shop(){
        $this->data['socials']          = Social::all()->where('status',1);
        $this->data['categories']       = Category::with('SubCategory')->where('status',1)->get();
        $this->data['products']         = Product::all()->where('status',1);
        $this->data['cartItems']        = \Cart::getContent();

        return view('users.shop',$this->data);
    }
    public function product_by_cat($id){
        $this->data['socials']          = Social::all()->where('status',1);
        $this->data['categories']       = Category::with('SubCategory')->where('status',1)->get();
        $this->data['sliders']        = Slider::all()->where('status',1)->take(3);
        $this->data['products']       = Product::where('status',1)->where('category_id',$id)->limit(12)->get();
        $this->data['products_data']  = Product::all()->where('status',1);
        $this->data['cartItems']      = \Cart::getContent();

        return view('users.product_by_cat',$this->data);
    }

    public function product_by_sub_cat($id){
        $this->data['socials']          = Social::all()->where('status',1);
        $this->data['categories']       = Category::with('SubCategory')->where('status',1)->get();
        $this->data['sliders']          = Slider::all()->where('status',1)->take(3);
        $this->data['products']         = Product::where('status',1)->where('sub_category_id',$id)->limit(12)->get();
        $this->data['cartItems']        = \Cart::getContent();

        return view('users.product_by_sub_cat',$this->data);

    }

    public function search_product(Request $request){
        $this->data['socials']          = Social::all()->where('status',1);
        $this->data['categories']       = Category::with('SubCategory')->where('status',1)->get();
        $this->data['cartItems']        = \Cart::getContent();

    //    return $request->search_product;

       $products                       = Product::orderBy('id','desc')->where('product_title','LIKE','%'.$request->search_product.'%');
       $this->data['products']         = $products->get();

        return view('users.search_product',$this->data);
    }

    public function product_details($id){
        $this->data['socials']          = Social::all()->where('status',1);
        $this->data['categories']       = Category::with('SubCategory')->where('status',1)->get();
        $this->data['products_data']    = Product::findOrFail($id);
        $this->data['products']         = Product::where('status',1)->limit(3)->get();
        $this->data['cartItems']        = \Cart::getContent();

        return view('users.product_details',$this->data);
    }

}
