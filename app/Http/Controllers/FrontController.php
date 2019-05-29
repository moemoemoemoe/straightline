<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\View;
use Redirect;
use App\Airport;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_index()
    {
        return view('front.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_index_search(Request $r)
    { 
        $type = $r->input('the_type');
       // return $type;
        $from = $r->input('from');
        $to = $r->input('to');
        $dep_date = $r->input('dep_date');
        $rev_date = $r->input('rev_date');
        $adult = $r->input('adu');
        $child = $r->input('chil');
  $dep_hex = str_replace('/', '%2F', $dep_date);
        $ret_hex = str_replace('/', '%2F', $rev_date);
        if($type == 1)
        {
 $link = "https://www.epower.amadeus.com/slt/#AdtCount=".$adult."&CabinClass=&ChdCount=".$child."&Culture=en-US&DepartureDate=".$dep_hex."&From=".$from."&InfCount=1&Method=Search&Page=Result&PaxAge=&ProviderList=OnlyAmadeus&QTo=A&ReturnDate=".$ret_hex."&To=".$to;
 //return $link;
Session::put('link', $link);
}
if($type == 2)
{

 $link = "https://www.epower.amadeus.com/slt/#AdtCount=".$adult."&CabinClass=&ChdCount=".$child."&CorpFareSearchOptions=null&CrossBorderSearchOptions=&Culture=en-US&DepartureDate=".$dep_hex."&DepartureFlexibleDate=&DepartureTime=00%3A01&DirectFlightsOnly=false&FamilyCardDiscount=&FamilyDiscount=&FlightType=OneWay&ForcePTC=&From=".$from."&IsCalendarSearch=false&IsMajorCabin=false&ManualCostAmount=&ManualCostType=none&Method=Search&Page=Result&PaxAge=&QFrom=C&QTo=A&RefundableFlight=false&ReturnDate=&ReturnTime=&SearchOptions=&To=".$to;
 //return $link;
Session::put('link', $link);

}
if($type == 3)
{
 $link = "https://www.epower.amadeus.com/slt/#AdtCount=".$adult."&CabinClass=&ChdCount=".$child."&Culture=en-US&DepartureDate=".$dep_hex."&DepartureDate1=".$dep_hex."&DepartureFlexibleDate1=&DepartureTime=&DepartureTime1=&FlightType=MultiLeg&From=".$from."&From1=".$from."&InfCount=&IsMajorCabin=false&Method=Search&Page=Result&PaxAge=&QFrom1=C&QTo=A&QTo1=C&To=".$to."&To1=".$to;
 //return $link;
Session::put('link', $link);
   
}

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function result_search()
    {
        return view('search_test.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function autocomplete($key)
    {
        $query = Airport::where('countryName','LIKE','%{$key}%')->get();
        return $query;
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
