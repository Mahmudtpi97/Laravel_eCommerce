<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Social;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shipping;
use App\Models\SubCategory;
use App\Models\UserPayment;
use Darryldecode\Cart\Cart;

use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function checkout(){
        $this->data['socials']        = Social::all()->where('status',1);
        $this->data['categories']     = Category::with('SubCategory')->where('status',1)->get();
        $this->data['products']       = Product::all()->where('status',1);
        $this->data['cartItems']      = \Cart::getContent();

        // if ( \Cart::isEmpty() ) {
        //      return redirect()->to('cart')->with('warning','Please Add a One Product.');
        // }
            return view('users.checkout',$this->data);

    }
    public function thank_you(){
        $this->data['socials']        = Social::all()->where('status',1);
        $this->data['categories']     = Category::with('SubCategory')->where('status',1)->get();
        $this->data['cartItems']      = \Cart::getContent();


        if ( \Cart::isEmpty() ) {
            return redirect()->to('shop')->with('warning','Please Add a One Product.');
       }

        return view('users.thank_you',$this->data);
    }

        public function shipping (Request $request){

                $request->validate([
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'email'      => 'required|email',
                    'number'     => 'required|numeric',
                    'address'    => 'required',
                    'city'       => 'required',
                    'state'      => 'required',
                    'country'    => 'required',
                    'zip_code'   => 'required',
                    'payment_method'   => 'required',
                ]);

            // All Data
             $data = $request->all();
            // Shipping Data Added by Database Shipping Table
             $shipping = array();
             $shipping['user_id']           = Session::get('id');
             $shipping['first_name']        = $data['first_name'];
             $shipping['last_name']         = $data['last_name'];
             $shipping['email']             = $data['email'];
             $shipping['number']            = $data['number'];
             $shipping['address']           = $data['address'];
             $shipping['city']              = $data['city'];
             $shipping['state']             = $data['state'];
             $shipping['country']           = $data['country'];
             $shipping['zip_code']          = $data['zip_code'];

             $shipping_id = DB::table('shippings')->insertGetId($shipping);
             Session::put('shipping_id',$shipping_id);

            // Payment Data Added by Database user_payment Table
             $user_payment = array();
             $user_payment['user_id']           = Session::get('id');
             $user_payment['payment_method']    = $data['payment_method'];
             $user_payment['status']            = '0';

             $user_payment_id = DB::table('user_payments')->insertGetId($user_payment);
             Session::put('user_payment_id',$user_payment_id);

            // Order Data Added by Database Order Table
            $order = array();
            $order['user_id']               = Session::get('id');
            $order['shipping_id']           = $shipping_id ;
            $order['payment_id']            = $user_payment_id;
            $order['quantity']              =  \Cart::getContent()->sum('quantity');;
            $order['total']                 =  \Cart::getTotal();
            $order['status']                = '0';

            $order_id = DB::table('orders')->insertGetId($order);
            Session::put('order_id',$order_id);

           // OrderDetails Data Added by Database order_details Table
            $cartItem = \Cart::getContent();
           $order_details = array();
           foreach ($cartItem as $item) {
                $order_details['order_id']           = $order_id;
                $order_details['product_id']         = $item->id;
                $order_details['product_name']       = $item->name;
                $order_details['product_price']      = $item->price;
                $order_details['product_quantity']   = $item->quantity;

                $order_details_id = DB::table('order_details')->insert($order_details);
           }


        //    Session::put('order_details_id',$order_details_id);

        \Cart::clear();
           return Redirect()->to('thank_you');
        }


        // Top Product
        public function top_selling(){
            $this->data['socials']        = Social::all()->where('status',1);
            $this->data['categories']     = Category::with('SubCategory')->where('status',1)->get();
            $this->data['cartItems']      = \Cart::getContent();


           $products = Product::selectRaw('products.id, SUM(order_details.product_quantity) as total')
                                    ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
                                    ->groupBy('products.id')
                                    ->orderBy('total','desc')
                                    ->take(9)
                                    ->get();

                         $topProducts = [];
                         foreach($products as $product){
                                $p_id = Product::findOrFail($product->id);
                                $p_id->totalQty = $product->total;

                                $topProducts[] = $p_id;
                    }
            return view('users.top_selling',$this->data,compact('topProducts'));
        }
     // Latest Product
        public function latest_product(){
            $this->data['socials']        = Social::all()->where('status',1);
            $this->data['products']       = Product::where('status',1)->latest()->take(9)->get();
            $this->data['categories']     = Category::with('SubCategory')->where('status',1)->get();
            $this->data['cartItems']      = \Cart::getContent();

            return view('users.latest_product',$this->data);
        }


}
