<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','status'];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function SubCategory(){
        return $this->hasMany(SubCategory::class)->where('status',1);
    }


    public static function arrayByCategory(){
        $arr = [];
        $categories  = Category::all()->where('status',1);

        foreach ($categories as $category){
            $arr[$category->id] = $category->title;
        }
        return $arr;
    }

}
