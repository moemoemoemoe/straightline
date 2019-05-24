<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Popular;
use Validator;
use paginate;
use Redirect;

class PopularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_popular()
    {
        $pops = Popular::orderBy('id','DESC')->paginate(8);
        return view('popular.popular_index',compact('pops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_popular_save(Request $r)
    {
        
         $foreign_name = mt_rand(111111,999999);
        $country = $r->input('country');
        $city =$r->input('city');
        $photo = $r->file('photo');
         $url =$r->input('url');
       

        $data = ['country' => $country, 'city'=>$city, 'photo' =>$photo, 'url' => $url];
        $rules = ['country' => 'required', 'city' =>'required', 'photo'=>'required' , 'url' =>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
            $destination = 'uploads/popular';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
            $popular = new Popular();
            $popular->country = $country;
            $popular->city = $city;
            $popular->image = $photo_name;
            $popular->url = $url;
            $popular->status = 0;
            $popular->save();
            return Redirect::back()->with('success', 'New Destination successfuly created');
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
    public function update_popular($id)
    {
        $pops = Popular::findOrFail($id);
        return view('popular.update_popular',compact('pops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish_popular($id)
    {
         $main = Popular::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Destination is Published');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Destination is Unpublished');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_popular_save(Request $r, $id)
    {
         $foreign_name = mt_rand(111111,999999);
        $country = $r->input('country');
        $city =$r->input('city');
        $photo = $r->file('photo');
         $url =$r->input('url');
       

        $data = ['country' => $country, 'city'=>$city, 'url' => $url];
        $rules = ['country' => 'required', 'city' =>'required' , 'url' =>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
           

            $popular =  Popular::findOrFail($id);
            $popular->country = $country;
            $popular->city = $city;
             if($r->hasFile('photo')){
            $destination = 'uploads/popular';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
        } 
           
           
            $popular->url = $url;
             if($r->hasFile('photo')){
            unlink('uploads/popular/'.$popular->image);
            $popular->image = $photo_name;
        }
            $popular->save();
            return Redirect::back()->with('success', 'New Destination successfuly Updated');
        }
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
