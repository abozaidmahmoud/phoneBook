<?php

namespace App\Http\Controllers;

use App\Model\phone;
use Illuminate\Http\Request;
use Validator;

class PhoneController extends Controller
{
  
    public function index()
    {
       return view('phonebook');
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $req)
    {
        // $vaildate=Validator::make($req->all(),[
        //     'name'=>'required|min:3|max:55',
        //     'phone'=>'required|numeric|min:5|max:14',
        //     'email'=>'required|email',

        // ]);

        $this->validate($req,[
            'name'=>'required|min:3|max:55',
            'phone'=>'required|numeric|min:5|max:14',
            'email'=>'required|email',
        ]);

        // if($vaildate->fails()){
        //     return response()->json(['msg'=>'error','error_validation'=>$vaildate->errors()]);
        // }
           phone::create($vaildate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(phone $phone)
    {
        //
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
