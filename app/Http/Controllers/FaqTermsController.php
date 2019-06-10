<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Term;
use Validator;
use Redirect;
use paginate;
class FaqTermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq_index()
    {
        $faqs = Faq::orderBy('id','DESC')->get();
        return view('faq_terms.faq_index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq_index_save(Request $r)
    {
        $question = $r->input('question');
        $answer =$r->input('answer');
       
       

        $data = ['question' => $question, 'answer'=>$answer ];
        $rules = ['question' => 'required', 'answer' =>'required' ];
        $v = Validator::make($data, $rules);
        if($v->fails()){
            return Redirect::Back()->withErrors($v)->withInput($r->input());
        }else
       {
           
        $faq = new Faq();
        $faq->question = $question;
        $faq->answer = $answer;
        
        $faq->status = 0;

           
            $faq->save();
            return Redirect::back()->with('success', 'FAQ Created Successfully');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function faq_archive($id)
    {
         $main = Faq::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', ' is Archived');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', ' is Unarchived');

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function terms_index()
    {
        $terms = Term::orderBy('id' , 'DESC')->limit(1)->get();
        return view('prof_loyality.terms_condition',compact('terms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function terms_index_save(Request $r)
    {
        $description = $r->input('description');
        $terms  = Term::findOrFail(1);
        $terms->Description = $description;
        $terms->save();
        return Redirect::back()->with('success', ' successfuly Updated');
    
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
