<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SubCategoriesController extends Controller
{
    //  Sub Category Show by sub_categories Page
    public function index(){
        $this->data['sub_category'] = SubCategory::all();
        return view('admin.categories.sub_categories.sub_categories',$this->data);
    }

   //  Sub Category Create
    public function add_categories(){
        $this->data['categories'] = Category::arrayByCategory();
        return view('admin.categories.sub_categories.sub_cat_create',$this->data);

    }
    //  Sub Category Create
    public function store(Request $request){

          $request->validate([
                'title' => 'required|unique:sub_categories',
                'category_id' => 'required',
          ],
            ['category_id.required' => 'The Parent Category field is required.'],
        );

          $formData = $request->all();
        if (SubCategory::create($formData)) {
            Session::flash('message','Sub Category Add Successfully !');
        }
        return redirect()->route('sub_categories');

    }
    //  Sub Category Updated
    public function edit($id){
        $this->data['categories'] = Category::arrayByCategory();
        $this->data['sub_category'] = SubCategory::findOrFail($id);
        return view('admin.categories.sub_categories.sub_cat_edit',$this->data);
    }

    // Sub Category Updated

    public function update(Request $request,$id){
        $request->validate([
              'title' => 'required',
              'category_id' => 'required',
          ]);

         $formData      = SubCategory::findOrFail($id);
         $data         = $request->all();

         $formData->title       = $data['title'];
         $formData->category_id = $data['category_id'];

        // if ( $formData->category_id == $data['category_id']) {
        //     return $formData->category_id.'a';
        //   }
        //   else{
        //     return $formData->category_id ;
        //   }

          if ($formData->save()) {
            Session::flash('message','Sub Category Updated Successfully !');
        }
        return redirect()->route('sub_categories');

   }

        // Sub Category Status Change
   public function sub_cat_status_change($id){
        $formData      = SubCategory::findOrFail($id);

        if ($formData->status == 0) {
            $formData->update(['status' => 1]);
            Session::flash('message','Sub Category Active Successfully !');
        }
        else{
            $formData->update(['status' => 0]);
            Session::flash('message','Sub Category InActive Successfully !');
        }
        return redirect()->route('sub_categories');
   }

   // Sub Category Deleted
    public function destroy($id){
        $dlt_cat = SubCategory::findOrFail($id);

        if ($dlt_cat->delete()) {
            Session::flash('message','Sub Category Deleted Successfully');
        }
        return redirect()->route('sub_categories');
    }


}
