<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlidersRequest;
use Illuminate\Support\Facades\Session;

class SlidersController extends Controller
{
        // Slider Index
        public function index(){
            $this->data['sliders'] = Slider::all();
            return view('admin.sliders.sliders',$this->data);
        }
         // Slider Create
        public function create(){
            return view('admin.sliders.create');
        }
         // Slider Store
        public function store(SlidersRequest $request){
            $formData = $request->all();
            //   Slider Image
            $imgData = $request->file('slider_img');
            $imgName = date('Y-m-d-H-i-s_').$imgData->getClientOriginalName();
            $imgPath = $imgData->move('storage/images/sliders/',$imgName);

            $formData ['slider_img'] = asset($imgPath);

            if (Slider::create($formData)) {
                Session::flash('message','Sliders Add Successfully !');
            }
            return redirect()->to('admin/sliders');
        }

         // Slider Edit
        public function edit($id){
            $this->data['sliders'] = Slider::findOrFail($id);
            return view('admin.sliders.edit',$this->data);
        }

         // Slider Update
        public function update(SlidersRequest $request,$id){

            $formData      = Slider::findOrFail($id);
            $data          = $request->all();

            //   Slider Image Update
            $imgData = $request->file('slider_img');
            $imgName = date('Y-m-d-H-i-s_').$imgData->getClientOriginalName();
            $imgPath = $imgData->move('storage/images/sliders/',$imgName);

            $formData ['slider_img'] = asset($imgPath);

            $formData->title            = $data['title'];
            $formData->sub_title        = $data['sub_title'];
            $formData->btn_title        = $data['btn_title'];

            if ($formData->save()) {
                Session::flash('message','Slider Updated Successfully !');
            }
            return redirect()->to('admin/sliders');

        }
        // Slider Delete
        public function destroy($id){
            $dlt_cat = Slider::find($id);

            if ($dlt_cat->delete()) {
                Session::flash('message', 'Slider Deleted Successfully');
            }
            return redirect()->to('admin/sliders');
        }

    //   Category Status Active
    public function sliders_status_change(Slider $slider){

        if ($slider->status == 1) {
            $slider->update(['status'=> 0]);
            Session::flash('message','Slider InActive Successfully !');
        }
        else{
            $slider->update(['status'=> 1]);
            Session::flash('message','Slider Active Successfully !');
        }
        return redirect()->to('admin/sliders');
    }

    }
