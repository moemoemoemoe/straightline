<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use App\Insurance;
use App\Callback;
use App\Mailing;
use App\Reservationpack;
use App\Contactmessage;

class FrontSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit_insurance(Request $r)
    {

        $full_name = $r->input('insurance_fullname');
        $father_name = $r->input('insurance_fathername');
        $phone = $r->input('insurance_phone');
        $email = $r->input('insurance_email');
        $dob = $r->input('insurance_birth');
        $depart_date = $r->input('flight_from_date');
        $return_date = $r->input('flight_to_date');
        $adult = $r->input('adult');
        $child = $r->input('child');
        $pass_id = $r->input('insurance_passport');
                  
                  $data = ['insurance_fullname' => $full_name,'insurance_fathername' => $father_name,'insurance_phone' => $phone,'insurance_birth' => $dob,'flight_from_date' => $depart_date,'flight_to_date' => $return_date,'adult' => $adult,'child' => $child,'insurance_email' => $email,'insurance_passport' => $pass_id];

                  $rules = ['insurance_fullname' => 'required','insurance_fathername' => 'required','insurance_phone' => 'required','insurance_birth' => 'required','flight_from_date' => 'required','flight_to_date' => 'required','adult' => 'required','child' => 'required','insurance_passport' => 'required','insurance_email' => 'required',];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors("Somthing Missing")->withInput($r->input());
            }
            else
            {
$insurance = new Insurance();
$insurance->full_name = $full_name ; 
$insurance->father_name = $father_name ; 
$insurance->phone = $phone ; 
$insurance->email = $email ; 
$insurance->dob = $dob ; 
$insurance->pass_id = $pass_id ; 
$insurance->depart_date = $depart_date ; 
$insurance->return_date = $return_date ; 
$insurance->adult = $adult ; 
$insurance->child = $child ; 
$insurance->status = 0 ; 
$insurance->save();
 return Redirect::back()->with('success', 'Quote successfully submited');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit_callback(Request $r)
    {
        
        $full_name = $r->input('ur_fullname');
        $phone = $r->input('ur_phone');
        $email = $r->input('ur_email');
        $your_mind = $r->input('your_mind');
        $your_go = $r->input('your_go');
        $your_whene = $r->input('your_whene');
       
       
                  
                  $data = ['full_name' => $full_name,'phone' => $phone,'email' => $email,'your_mind' => $your_mind,'your_go' => $your_go,'your_whene' => $your_whene];

                  $rules = ['full_name' => 'required','phone' => 'required','your_whene' => 'required','email' => 'required','your_mind' => 'required','your_go' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors("Somthing Missing")->withInput($r->input());
            }
            else
            {
$callback = new Callback();
$callback->full_name = $full_name ; 

$callback->phone = $phone ; 
$callback->email = $email ;
 $callback->your_mind = $your_mind ; 
$callback->your_go = $your_go ; 
$callback->your_whene = $your_whene ; 


$callback->status = 0 ; 
$callback->save();
 return Redirect::back()->with('success', 'Callback successfully submited');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit_mailinglist(Request $r)
    {
         $full_name = $r->input('footer_ur_name');
       
        $email = $r->input('footer_ur_email');
       
       
       
                  
                  $data = ['full_name' => $full_name,'email' => $email];

                  $rules = ['full_name' => 'required','email' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors("Somthing Missing")->withInput($r->input());
            }
            else
            {
$mailing = new Mailing();
$mailing->full_name = $full_name ; 
$mailing->email = $email ;
 

$mailing->status = 0 ; 
$mailing->save();
 return Redirect::back()->with('success', 'Mailing successfully submited');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submit_reservation_pack(Request $r,$id)
    {
        $firstname = $r->input('firstname');
        $phone = $r->input('email');
        $email = $r->input('phone');
        $lastname = $r->input('lastname');
        $from_date = $r->input('from_date');
        $to_date = $r->input('to_date');
        $message = $r->input('message');
          $nbtravellers = $r->input('nbtravellers');

  
                  $data = ['firstname' => $firstname,'phone' => $phone,'email' => $email,'lastname' => $lastname,'from_date' => $from_date,'to_date' => $to_date,'nbtravellers'=>$nbtravellers];

                  $rules = ['firstname' => 'required','phone' => 'required','email' => 'required','lastname' => 'required','from_date' => 'required','to_date' => 'required','nbtravellers'=>'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors("Somthing Missing")->withInput($r->input());
            }
            else
            {
$callback = new Reservationpack();
$callback->package_id = $id ; 
$callback->name = $firstname ; 
$callback->last_name = $lastname ;
$callback->phone = $phone ; 
$callback->email = $email ;
$callback->traveller_number = $nbtravellers ; 
$callback->dep_date = $from_date ; 
$callback->return_date = $to_date ; 
if($message == '' || $message == NULL)
{
    $callback->message = 'No message' ;
} else
{
    $callback->message = $message ; 
}

$callback->status = 0 ; 
$callback->save();
 return Redirect::back()->with('success', 'Reservation Package successfully submited');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submit_contactus(Request $r)
    {
         $firstname = $r->input('firstname');
        $phone = $r->input('email');
        $email = $r->input('phone');
        $lastname = $r->input('lastname');
        
       
        $message = $r->input('message');
        

  
                  $data = ['firstname' => $firstname,'phone' => $phone,'email' => $email,'lastname' => $lastname,'message'=>$message];

                  $rules = ['firstname' => 'required','phone' => 'required','email' => 'required','lastname' => 'required','message'=>'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors("Somthing Missing")->withInput($r->input());
            }
            else
            {
$callback = new Contactmessage();
 
$callback->name = $firstname ; 
$callback->last_name = $lastname ;
$callback->phone = $phone ; 
$callback->email = $email ;
 

 $callback->message = $message ; 


$callback->status = 0 ; 
$callback->save();
 return Redirect::back()->with('success', 'Message successfully submited');
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
