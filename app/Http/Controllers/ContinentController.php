<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Continent;

use Validator;
use Redirect;
class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_cont()
    {
        $conts = Continent::orderBy('id','DESC')->paginate(8);

    return view('continents.manage_continent',compact('conts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_cont_save(Request $r)
    {
       $cont_name = $r->input('cont_name');

         $data = ['cont_name' => $cont_name];

            $rules = ['cont_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $cat_exist = Continent::where('cont_name',$cont_name)->count();

if($cat_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate Continent Name")->withInput($r->input());


} else
{

                  $them = new Continent();
                  $them->cont_name = $cont_name;
                  $them->status = 0;
               
               
                $them->save();
      return Redirect::Back()->with('success', 'Continent  added successfully');
            }
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
    public function publish_cont($id)
    {
         $main = Continent::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Continent is Published');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Continent is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_cont($id)
    {
         $conts = Continent::findOrFail($id);
        return view('continents.cont_update',compact('conts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_cont_save(Request $r,$id)
    {
       $cont_name = $r->input('cont_name');

         $data = ['cont_name' => $cont_name];

            $rules = ['cont_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $cat_exist = Continent::where('cont_name',$cont_name)->count();

if($cat_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate Continent Name")->withInput($r->input());


} else
{

                  $them =  Continent::findOrFail($id);
                  $them->cont_name = $cont_name;
               
               
               
                $them->save();
      return Redirect::Back()->with('success', 'Continent  Updated successfully');
            }
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
