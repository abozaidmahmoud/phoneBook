<?php

namespace App\Http\Controllers;

use App\Model\phone;
use Illuminate\Http\Request;
use App\Http\Requests\phonebook;

class PhoneController extends Controller
{
  
    public function index()
    {
       return view('phonebook');
    }

    public function getData(){
        return phone::all();
    }
  
    public function create()
    {
        //
    }

  
    public function store(phonebook $req)
    {

           phone::create($req->all());
          return response()->json(['msg'=>'phone created successfully']);
    }

    public function edit(phone $phone)
    {
        //
    }

    public function update(phonebook $req)
    {
        phone::find($req->id)->update($req->all());
        return response()->json(['msg'=>'phone updated successfully']);
    }

    public function destroy($id)
    {
        phone::find($id)->delete();
        return response()->json(['msg'=>'phone deleted successfully']);
    }
}
