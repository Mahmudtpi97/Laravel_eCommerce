<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','title','status'];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function product(){
        return $this->hasMany(Product::class);
    }




//  Array By SubCategory
    public static function arrayBySubCategory(){
        $arr =[];
        $subCategories = SubCategory::all()->where('status',1);

        foreach($subCategories as $subCategory){
            $arr[$subCategory->id] = $subCategory->title;
        }
        return $arr;
    }


}
