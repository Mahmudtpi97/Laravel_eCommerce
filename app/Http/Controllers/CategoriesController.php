<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index(){
        $this->data['categories'] = Category::all();
        return view('admin.categories.categories',$this->data);
    }
    public function add_categories(){
        return view('admin.categories.create');
    }
    public function store(Request $request){

          $request->validate([
                'title' => 'required|unique:categories'
            ]);
          $formData = $request->all();

        if (Category::create($formData)) {
            Session::flash('message','Category Add Successfully !');
        }
        return redirect()->route('categories');

    }
    public function edit($id){
        $this->data['categories'] = Category::findOrFail($id);
        return view('admin.categories.edit',$this->data);
    }

    public function update(Request $request,$id){

        $request->validate([
              'title' => 'required|'
          ]);

         $formData      = Category::findOrFail($id);
         $data          = $request->all();

         $formData->title       = $data['title'];
         $formData->description = $data['description'];


      if ($formData->save()) {
          Session::flash('message','Category Updated Successfully !');
      }
      return redirect()->route('categories');

  }

//   Category Status Active
public function active_categories($id){
    $formData      = Category::findOrFail($id);
	$formData->status = 0;

    if ($formData->save()) {
        Session::flash('message','Category InActive Successfully !');
    }
    return redirect()->route('categories');
}
//   Category Status InActive
public function inactive_categories($id){

    $formData = Category::findOrFail($id);
    $formData->status = 1;

    if ($formData->save()) {
        Session::flash('message','Category Active Successfully !');
    }
    return redirect()->route('categories');

}

    public function destroy($id){
        $dlt_cat = Category::find($id);

        if ($dlt_cat->delete()) {
            Session::flash('message', 'Category Deleted Successfully');
        }
        return redirect()->route('categories');
    }
}
