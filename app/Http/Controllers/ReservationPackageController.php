<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;
use App\Reservationpack;
use paginate;
use Validator;
use Redirect;
class ReservationPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservation_package_index()
    {
        $packages = Reservationpack::with('package')->orderBy('id','DESC')->paginate(20);
       
        return view('emails.reservation_package',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_reservation_package($id)
    {
         $reservations = Reservationpack::findOrFail($id);
           
            $reservations->delete();
                  return Redirect::Back()->with('success', 'Deleted Successfully');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function archive_reservation_package($id)
    {
        $main = Reservationpack::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Package is Archived');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Package is Unarchived');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_reservation_package($id)
    {
        $packages = Reservationpack::with('package')->where('id',$id)->get();
         return view('emails.view_reservation_package',compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reservation_package_search(Request $r)
    {
        $keyword = $r->input('search_keyword');

        if($keyword == '')
        {
             return Redirect::Back()->withErrors('keyword is Empty');
        }
        else
        {
        $packages = Reservationpack::with('package')->where('name','LIKE', '%'.$keyword.'%')->orWhere('phone','=', $keyword)->orWhere('email','LIKE', '%'.$keyword.'%')->get();
        return view('emails.search_reservation_package',compact('packages'));
    }
   
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
