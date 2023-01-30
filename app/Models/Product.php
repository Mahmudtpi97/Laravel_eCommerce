<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['product_title','product_short_des','product_description','current_price','old_price','product_size','product_color','product_img','status','category_id','sub_category_id'];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subCategories(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}
