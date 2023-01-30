<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\Product;
use App\Models\Category;

use App\Models\SubCategory;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add_to_cart(){
           $this->data['socials']        = Social::all()->where('status',1);
           $this->data['categories']     = Category::with('SubCategory')->where('status',1)->get();
           $this->data['products']       = Product::all()->where('status',1);

            $this->data['cartItems']      = \Cart::getContent();
            return view('users.product_cart',$this->data);
    }

    public function cart_store (Request $request,$id){
            $product_id  = $request->id;
            $product_qty = $request->quantity;

            $products = Product::all()->where('id',$id)->first();

            $saleCondition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'SALE 5%',
                'type' => 'tax',
                'value' => '-5%',
            ));


            $data['id']          = $product_id;
            $data['quantity']    = $product_qty;
            $data['name']        = $products->product_title;
            $data['price']       = $products->current_price;
            $data ['attributes']=[$products->product_img];
            // $data ['attributes']['image']= [$products->product_img];

            if ( \Cart::add($data) ) {
                // Session::put('cart_id',$data['id'] );
                Session::flash('message', 'Cart Added Successfully !');
            }

            return redirect()->to('cart');
    }
    public function cart_update (Request $request){

            // $id  = $request->id;
            // $qty = $request->quantity;


            // $data['id']          = $request->id;
            // $data['quantity']    = $request->quantity;

        //    \Cart::update($qty);


           \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

           Session::flash('message', 'Cart Update Successfully !');
           return redirect()->to('cart');

    }
    public function cart_delete ($id){

        \Cart::remove($id);
        Session::flash('message', 'Cart Delete Successfully !');
        return redirect()->to('cart');

    }


}
