<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function search_index()
    {


        return view('search_test.search_result');
    }

     public function search_index_result(Request $r)
    {

    $from =  $r->input('from') ;
    $to =  $r->input('to') ;//shahr/yom/sene
 $dep =  $r->input('dep') ;
 //return $dep;

    $ret =  $r->input('ret') ;

    $adult =  $r->input('adult') ;

    $child =  $r->input('child') ;
   
        $dep_hex = str_replace('/', '%2F', $dep);
        $ret_hex = str_replace('/', '%2F', $ret);

 $link = "https://www.epower.amadeus.com/slt/#AdtCount=".$adult."&CabinClass=&ChdCount=".$child."&Culture=en-US&DepartureDate=".$dep_hex."&From=".$from."&InfCount=1&Method=Search&Page=Result&PaxAge=&ProviderList=OnlyAmadeus&QTo=A&ReturnDate=".$ret_hex."&To=".$to;
 //return $link;
Session::put('link', $link);

        return view('search_test.result');
    }
}
