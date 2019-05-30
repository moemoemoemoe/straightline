<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailing;
use Validator;
use Redirect;
use paginate;

class MailingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mailing_index()
    {
        $mailings = Mailing::orderBy('id','DESC')->paginate(20);
        return view('emails.mailing_index',compact('mailings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_mailing($id)
    {
         $mailing = Mailing::findOrFail($id);
           
            $mailing->delete();
                  return Redirect::Back()->with('success', 'Deleted Successfully');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function archive_mailing($id)
    {
        $main = Mailing::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Message is Archived');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Message is Unarchived');
    }
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
