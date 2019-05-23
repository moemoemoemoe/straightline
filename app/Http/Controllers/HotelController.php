<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hotel;
use App\City;

use Validator;
use Redirect;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_hotel()
    {
        $hotels = Hotel::with('city')->orderBy('id','DESC')->paginate(8);

        $cities = City::with('country')->orderBy('id','DESC')->get();
        return view('hotel.manage_hotel',compact('hotels','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_hotel_save(Request $r)
    {
        $foreign_name = mt_rand(111111,999999);
        $name = $r->input('name');
        $city_id =$r->input('city_id');
        $photo = $r->file('photo');
         $coor_x =$r->input('coor_x');
        $coor_y =$r->input('coor_y');

        $data = ['name' => $name, 'coor_x'=>$coor_x, 'coor_y' =>$coor_y];
        $rules = ['name' => 'required', 'coor_x' =>'required', 'coor_y'=>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
            $destination = 'uploads/hotels';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
            $hotel = new Hotel();
            $hotel->name = $name;
            $hotel->img_url = $photo_name;
            $hotel->coor_x = $coor_x;
            $hotel->coor_y = $coor_y;
            $hotel->city_id = $city_id;
            $hotel->save();
            return Redirect::back()->with('success', 'New Hotel successfuly created');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hotel_update($id)
    {
       $hotels  =  Hotel::findOrFail($id);
       // return $cities;
        $cities = City::orderBy('id','DESC')->get();
        return view('hotel.hotel_update',compact('hotels','cities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hotel_update_save($id, Request $r)
    {
        


        $foreign_name = mt_rand(111111,999999);
        $name = $r->input('name');
        $city_id =$r->input('city_id');
        $photo = $r->file('photo');
         $coor_x =$r->input('coor_x');
        $coor_y =$r->input('coor_y');

        $data = ['name' => $name, 'coor_x'=>$coor_x, 'coor_y' =>$coor_y];
        $rules = ['name' => 'required', 'coor_x' =>'required', 'coor_y'=>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {


        if($r->hasFile('photo')){
            $destination = 'uploads/hotels';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
        } 
           
           
            $hotel = Hotel::findOrFail($id);
            $hotel->name = $name;
            $hotel->coor_x = $coor_x;
            $hotel->coor_y = $coor_y;
            $hotel->city_id = $city_id;
            if($r->hasFile('photo')){
            unlink('uploads/hotels/'.$hotel->img_url);
            $hotel->img_url = $photo_name;
        }
            
            $hotel->save();
            return Redirect::back()->with('success', 'New Hotel successfuly Updated');
        }
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
