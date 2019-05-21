<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;
use Validator;
use Redirect;

class CountryCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_country()
    {
        $countries = Country::orderBy('id','DESC')->get();
        return view('countrycity.country_index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_country_save(Request $r)
    {
        
         $name = $r->input('name');

         $data = ['name' => $name];

            $rules = ['name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $co_exist = Country::where('name',$name)->count();

if($co_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate Country Name")->withInput($r->input());


} else
{

                  $country = new Country();
                  $country->name = $name;
                
               
                $country->save();
      return Redirect::Back()->with('success', 'Country categories  added successfully');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_country_save(Request $r,$id)
    {
         $name = $r->input('name');

         $data = ['name' => $name];

            $rules = ['name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $co_exist = Country::where('name',$name)->count();

if($co_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate Country Name")->withInput($r->input());


} else
{

                  $country = Country::findOrFail($id);
                  $country->name = $name;
                
               
                $country->save();
      return Redirect::Back()->with('success', 'Country categories  Updated successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_country($id)
    {
        $countries = Country::findOrFail($id);
        return view('countrycity.country_update',compact('countries'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_city()
    {
        $countries = Country::orderBy('id','DESC')->get();
        $cities = City::with('country')->orderBy('id','DESC')->get();
        //return $cities;
        return view('countrycity.city_index',compact('countries','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_city_save(Request $r)
    {
         $name = $r->input('name');
$country_id = $r->input('country_id');
         $data = ['name' => $name];

            $rules = ['name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $co_exist = City::where('name',$name)->count();

if($co_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate City Name")->withInput($r->input());


} else
{

                  $city = new City();
                  $city->name = $name;
                  $city->country_id = $country_id;
                
            
                $city->save();
      return Redirect::Back()->with('success', 'City  Updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_city($id)
    {
        $cities  =  City::findOrFail($id);
       // return $cities;
        $countries = Country::orderBy('id','DESC')->get();
        return view('countrycity.city_update',compact('cities','countries'));
    }
     public function update_city_save($id,Request $r)
     {


         $name = $r->input('name');
$country_id = $r->input('country_id');
         $data = ['name' => $name];

            $rules = ['name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
               


                  $city = City::findOrFail($id);
                  $city->name = $name;
                  $city->country_id = $country_id;
                
            
                $city->save();
      return Redirect::Back()->with('success', 'City Updated  Updated successfully');
            }
        }
     

    
}
