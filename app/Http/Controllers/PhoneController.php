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
    }

 


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(phone $phone)
    {
        //
    }
}
