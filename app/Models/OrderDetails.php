<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','product_id','product_name','product_price','product_quantity'];

    public function orders(){
        return $this->belongsTo(Order::class,'order_id','id');
    }

}
