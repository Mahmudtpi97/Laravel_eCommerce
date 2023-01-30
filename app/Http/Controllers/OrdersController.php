<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $this->data['orders'] = Order::all();
        return view('admin.orders.orders',$this->data);
    }
    public function show($id){
        $this->data['orders']        = Order::findOrFail($id);
        $this->data['order_details'] = OrderDetails::where('order_id',$id)->get();
        return view('admin.orders.show',$this->data);
    }
    public function orders_pending(){
        $this->data['orders'] = Order::all()->where('status','0');
        return view('admin.orders.new_orders',$this->data);
    }
    public function orders_complete(){
        $this->data['orders'] = Order::all()->where('status','1');
        return view('admin.orders.complete_orders',$this->data);
    }
    public function order_status_change(Order $order){
        if ($order->status == 1) {
            $order->update(['status'=> 0]);
            Session::flash('message','Order InActive Successfully !');
        }
        else{
            $order->update(['status'=> 1]);
            Session::flash('message','Order Active Successfully !');
        }
        return redirect()->to('admin/orders');

    }

}
