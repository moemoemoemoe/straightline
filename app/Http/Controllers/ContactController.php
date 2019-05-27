<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Validator;
use Redirect;
use paginate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact_index()
    {
        $contacts = Contact::orderBy('id','ASC')->limit(1)->get();
     
        return view('contact.contact_index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact_index_save(Request $r)
    {
        $location_description = $r->input('location_description');
        $mobile =$r->input('mobile');
        $email =$r->input('email');
        $map_loc =$r->input('map_loc');
    
       

        $data = ['location_description' => $location_description, 'mobile'=>$mobile , 'email' => $email , 'map_loc' =>$map_loc];
        $rules = ['location_description' => 'required', 'mobile' =>'required' ,'email' =>'required' , 'map_loc' =>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
           
            $contact = Contact::findOrFail(1);
            $contact->location_description = $location_description;
            $contact->mobile = $mobile;
             $contact->email = $email;
            $contact->map_loc = $map_loc;
           
            $contact->save();
            return Redirect::back()->with('success', 'Contact US Updated Successfully');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
