<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Validator;
use Redirect;
use paginate;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_index()
    {
        $profiles = Profile::orderBy('id','ASC')->limit(1)->get();
     
        return view('prof_loyality.profile_index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_index_update(Request $r)
    {
        
        $description = $r->input('description');
        $mession =$r->input('detailed'); // mession
        $vision =$r->input('price_included'); //vision
        $goals =$r->input('execluded'); //goals
        $values =$r->input('values'); //values

    
       

        $data = ['description' => $description, 'detailed'=>$mession , 'price_included' => $vision , 'execluded' =>$goals,'values' => $values];
        $rules = ['description' => 'required', 'detailed' =>'required' ,'price_included' =>'required' , 'execluded' =>'required','values'=>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors('Error : Missing Entry')->withInput($r->input());
        }else
       {
           
            $prorfile = Profile::findOrFail(1);
            $prorfile->description = $description;
            $prorfile->mission = $mession;
            $prorfile->vision = $vision;
            $prorfile->goals = $goals;
            $prorfile->values = $values;

           
            $prorfile->save();
            return Redirect::back()->with('success', 'Profile Updated Successfully');
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
