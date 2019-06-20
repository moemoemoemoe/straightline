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
use App\Loyalitymessage;
use Mail;
use Illuminate\Support\Facades\Input;
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



$messages_all = 'Name: '.$r->input('full_name').'<p> Email : '.$r->input('email').'</p><p> Mobile Number: '.$r->input('phone').'</p>';


$data = array('name' =>'straight line admin', 'body' => $messages_all);
Mail::send('emails.mails',$data, function($message) {

        $firstname = Input::get('firstname');
        $email = Input::get('email');//mhadad
  $message->to(['info@straightline.com.lb', 'maroun@straightline.com.lb'], $firstname)
          ->subject('Postmaster CallBack Request (home page)');
  $message->from('straightline.travel@gmail.com','From straightline');
});

return Redirect::back()->with('success', 'Message successfully submited and email was sent to straightLine');
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
        $phone = $r->input('phone');
        $email = $r->input('email');
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


$messages_all = 'Message  :'.$r->input('message').'<p> Name: '.$r->input('firstname').'</p>'.$r->input('firstname').'<p> Last Name: ' .$r->input('lastname'). '</p> <p> Email : '.$r->input('email').'</p><p> Mobile Number: '.$r->input('phone').'</p>';


$data = array('name' =>'straight line admin', 'body' => $messages_all);
Mail::send('emails.mails',$data, function($message) {

        $firstname = Input::get('firstname');
        $email = Input::get('email');//mhadad
  $message->to(['Packages.straightline@gmail.com', 'maroun@straightline.com.lb'], $firstname)
          ->subject('Postmaster Package request (package page)');
  $message->from('straightline.travel@gmail.com','From straightline');
});

 return Redirect::back()->with('success', 'Reservation Package successfully submited and email was sent to straightLine');
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
        $email = $r->input('email');
        $phone = $r->input('phone');
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

// Mail::send([], [], function ($message) {
//   $message->to(Input::get('email'))
//     ->subject('contacat us form')
//     // here comes what you want
//     ->setBody(Input::get('message')) // assuming text/plain
//     // or:
//     ->setBody('<h1>Hi, welcome'.Input::get('name').'</h1>', 'text/html'); // for HTML rich messages
// });
//return Input::get('message');
$messages_all = 'Message  :'.$r->input('message').'<p> Name: '.$r->input('firstname').'</p><p> Last Name: ' .$r->input('lastname'). '</p> <p> Email : '.$r->input('email').'</p><p> Mobile Number: '.$r->input('phone').'</p>';


$data = array('name' =>'straight line admin', 'body' => $messages_all);
Mail::send('emails.mails',$data, function($message) {

        $firstname = Input::get('firstname');
        $email = Input::get('email');//mhadad
  $message->to(['info@straightline.com.lb', 'maroun@straightline.com.lb'], $firstname)
          ->subject('Postmaster Contact Us');
  $message->from('straightline.travel@gmail.com','From straightline');
});

return Redirect::back()->with('success', 'Message successfully submited and email was sent to straightLine');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function submit_loyality(Request $r)
    {
         $firstname = $r->input('firstname');
        $email = $r->input('email');
        $phone = $r->input('phone');
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
$loyality = new Loyalitymessage();
 
$loyality->name = $firstname ; 
$loyality->last_name = $lastname ;
$loyality->phone = $phone ; 
$loyality->email = $email ;
 

 $loyality->message = $message ; 


$loyality->status = 0 ; 
$loyality->save();
 return Redirect::back()->with('success', 'Message successfully submited');
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
