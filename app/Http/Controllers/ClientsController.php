<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['clients'] = Client::all();
        return view('admin.clients.clients',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_img' => 'required|mimes:png,jpg,jpeg',
        ]);

        $formData= $request->all();
        // Image Upload
        $imgData = $request->file('client_img');
        $imgName = date('Y-m-d-H-m-s').'.'.$imgData->getClientOriginalExtension();
        $imgPath = $imgData->move('storage/images/clients').$imgName;

        $formData['client_img'] = asset($imgPath);

        if (Client::create($formData)) {
            Session::flash('message','Client Add Successfully !');
        }
        return redirect()->to('admin/clients');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['clients'] = Client::findOrFail($id);
        return view('admin.clients.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formData      = Client::findOrFail($id);
        $data          = $request->all();

        //   Slider Image Update
        $imgData = $request->file('client_img');
        $imgName = date('Y-m-d-H-i-s_').'.'.$imgData->getClientOriginalName();
        $imgPath = $imgData->move('storage/images/clients',$imgName);

        $formData ['client_img'] = asset($imgPath);

        if ($formData->save()) {
            Session::flash('message','Client Updated Successfully !');
        }
        return redirect()->to('admin/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $dlt_cat = Client::find($id);

        if ($dlt_cat->delete()) {
            Session::flash('message', 'Client Deleted Successfully');
        }
        return redirect()->to('admin/clients');
    }


    //   Category Status Active
    public function clients_status_change(Client $client){

        if ($client->status == 1) {
            $client->update(['status'=> 0]);
            Session::flash('message','Client InActive Successfully !');
        }
        else{
            $client->update(['status'=> 1]);
            Session::flash('message','Client Active Successfully !');
        }
        return redirect()->to('admin/clients');
    }
}
