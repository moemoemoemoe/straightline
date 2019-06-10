<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loyality;
use App\Loyalitymessage;

use Validator;
use Redirect;
use paginate;
class LoyalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loyality_index()
    {
        $loyalities = Loyality::orderBy('id','DESC')->get();
        return view('prof_loyality.loyality_index',compact('loyalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loyality_archive($id)
    {
       
        $main = Loyality::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', ' is Archived');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', ' is Unarchived');

    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loyality_index_save(Request $r)
    {
        $name = $r->input('name');
        $from_value =$r->input('from_value');
        $to_value =$r->input('to_value');
        $point_usd =$r->input('point_usd');
    
       

        $data = ['name' => $name, 'from_value'=>$from_value , 'to_value' => $to_value , 'point_usd' =>$point_usd];
        $rules = ['name' => 'required', 'from_value' =>'required' ,'to_value' =>'required' , 'point_usd' =>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
           
        $loyality = new Loyality();
        $loyality->name = $name;
        $loyality->from_value = $from_value;
        $loyality->to_value = $to_value;
        $loyality->point_usd = $point_usd;
        $loyality->status = 0;

           
            $loyality->save();
            return Redirect::back()->with('success', 'Loyality Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loyality_messages()
    {

        $messages = Loyalitymessage::orderBy('id','DESC')->get();
        
        return view('prof_loyality.loyality_message',compact('messages'));
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
