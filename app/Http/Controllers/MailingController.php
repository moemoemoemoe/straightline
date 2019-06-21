<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailing;
use Validator;
use Redirect;
use paginate;
use App\Emailtosend;

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
    public function manage_sending_mails()
    {
        $emails = Emailtosend::orderBy('id','DESC')->get();
        return view('mails.index',compact('emails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_sending_mails_save(Request $r)
    {
        
       
        $section_id =$r->input('section_id');
        $emails =$r->input('emails');
 $emails_count = Emailtosend::orderBy('id','DESC')->where('section_id', $section_id)->count();
 if($emails_count > 0 )
 {

     return Redirect::Back()->withErrors("You All Ready Have This Section Created..please just update your emails")->withInput($r->input());
 }
 else
 {

        $data = ['emails' => $emails];
        $rules = ['emails' => 'required'];

        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
           
            $mails_save = new Emailtosend();
            $mails_save->section_id = $section_id;
            $mails_save->emails = $emails;
            $mails_save->save();
            return Redirect::back()->with('success', 'Created Successfully');
        }
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_mail_receive($id)
    {
        $mails_save = Emailtosend::findOrFail($id);
        return view('mails.update',compact('mails_save'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_mail_receive_save(Request $r,$id)
    {
         
          $emails =$r->input('emails');

        $data = ['emails' => $emails];
        $rules = ['emails' => 'required'];

        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
           
            $mails_save = Emailtosend::findOrFail($id);
            
            $mails_save->emails = $emails;
            $mails_save->save();
            return Redirect::back()->with('success', 'Updated  Successfully');
        }
    }
}
