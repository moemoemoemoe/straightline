<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;
use Redirect;
use paginate;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_service()
    {
        $services = Service::orderBy('id','DESC')->paginate(8);
        return view('service.create_service',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_service_save(Request $r)
    {
        
        $name = $r->input('name');
        $description =$r->input('description');
       
         $is_important =$r->input('is_important');
       

        $data = ['name' => $name, 'description'=>$description];
        $rules = ['name' => 'required', 'description' =>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
           
            $service = new Service();
            $service->name = $name;
            $service->description = $description;
            $service->is_important = $is_important;
            $service->status = 1;
            $service->save();
            return Redirect::back()->with('success', 'New Service successfuly created');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function publish_service($id)
    {
         $main = Service::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Service is Published');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Service is Unpublished');
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_service_save($id ,Request $r)
    {
          
        $name = $r->input('name');
        $description =$r->input('description');
       
       
       

        $data = ['name' => $name, 'description'=>$description];
        $rules = ['name' => 'required', 'description' =>'required'];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
           
            $service = Service::findOrFail($id);
            $service->name = $name;
            $service->description = $description;
           
            $service->save();
            return Redirect::back()->with('success', 'New Service successfuly updated');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_service($id)
    {
        $services = Service::findOrFail($id);
        return view('service.update_service',compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_section($id)
    {
         $main = Service::findOrFail($id);
     if($main->is_important == '0')
     {
       $main->is_important = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Service is In Top Section');
     }
     else{
      $main->is_important = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Service is In Other Services');
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
