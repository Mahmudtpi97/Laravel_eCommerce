<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','shipping_id','payment_id','quantity','total','status'];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function order_details(){
        return $this->hasMany(OrderDetails::class);
    }
}
