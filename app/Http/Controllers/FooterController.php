<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FooterController extends Controller
{
    // Social Item
    public function social_link(){
        $this->data['socials'] = Social::all();
        return view('admin.social.social',$this->data);
    }
    public function create_social_link(){
        return view('admin.social.create');
    }

    public function store(Request $request){
        $request->validate([
            'icon' => 'required|unique:socials',
            'link' => 'required'
        ]);
        $formData = $request->all();

        if (Social::create($formData)) {
            Session::flash('Social Link Create Successfully');
        }
        return redirect()->to('admin/social_link');

    }
    public function social_status_change(Social $id){
        if ($id->status==1) {
            $id->update(['status'=> 0]);
            Session::flash('message','Social Link InActive Successfully !');
        }
        else{
            $id->update(['status'=> 1]);
            Session::flash('message','Social Link Active Successfully !');
        }
        return redirect()->to('admin/social_link');
    }
    public function destroy($id){
        $social_dlt = Social::findOrFail($id);
        if ($social_dlt->delete()) {
            Session::flash('message','Social Link Active Successfully !');
        }
        return redirect()->to('admin/social_link');
    }


    // Footer Item
    public function footer(){
        $this->data['footers'] = Footer::all();
        return view('admin.footer.footer',$this->data);
    }
    public function create_footer(){
        return view('admin.footer.create');
    }

    public function create_item(Request $request){
        $request->validate([
            'f_logo'      => 'required',
            'description' => 'required',
            'address'     => 'required',
            'mail'        => 'required',
            'number'      => 'required',
        ]);
        $formData = $request->all();

        if (Footer::create($formData)) {
            Session::flash('Social Link Create Successfully');
        }
        return redirect()->to('admin/social_link');

    }

    // public function destroy($id){
    //     $social_dlt = Social::findOrFail($id);
    //     if ($social_dlt->delete()) {
    //         Session::flash('message','Social Link Active Successfully !');
    //     }
    //     return redirect()->to('admin/social_link');
    // }

}
