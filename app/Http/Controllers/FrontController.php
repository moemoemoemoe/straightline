<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\View;
use Redirect;
use App\Airport;
use App\Packages;
use App\Popular;
use App\Theme;
use App\Image;
use App\Contact;
use App\Faq;
use App\Term;
use App\Profile;
use App\Loyality;
use App\Service;
use App\City;
use Validator;
use Mail;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_index()
    {
        $packages_best = Packages::orderBy('id','DESC')->with('city')->where('is_featured',1)->limit(6)->get();
        $packages_featured = Packages::orderBy('id','DESC')->with('city')->where('is_featured',0)->limit(6)->get();
        $populars_all = Popular::orderBy('id','ASC')->where('status',1)->limit(7)->get();
  
          $cities = City::orderBy('id','DESC')->get();
  
        return view('front.index',compact('packages_best','packages_featured','populars_all','cities'));
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
   
        $from_one = $r->input('from');
        $to_one = $r->input('to');
        $dep_date = $r->input('dep_date');
        $rev_date = $r->input('rev_date');
        $adult = $r->input('adu');
        $child = $r->input('chil');
  $dep_hex = str_replace('/', '%2F', $dep_date);
        $ret_hex = str_replace('/', '%2F', $rev_date);

preg_match('#\((.*?)\)#', $from_one, $match);
preg_match('#\((.*?)\)#', $to_one, $matchto);




        $from = $match[1] ;
        $to =    $matchto[1];
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
        // /return Session::get('link');
        return view('search_test.result');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
     
    $data = Airport::select("code as name","countryName as cn","name as n","cityName as city")->where("countryName","LIKE","%{$request->input('query')}%")->orWhere("code","LIKE","%{$request->input('query')}%")->orWhere("name","LIKE","%{$request->input('query')}%")->orWhere("cityName","LIKE","%{$request->input('query')}%")->get();
       
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function package_detail($id)
    {
        $packages_detail = Packages::with('city')->findOrFail($id);


 

if($packages_detail->detailed)
{
$doc = new \DOMDocument();
$doc->loadHTML($packages_detail->detailed);
$liList = $doc->getElementsByTagName('li');

foreach ($liList as $li) {
  

    $data2[] = [
        'label' => 'desc',
        'value' => $li->nodeValue
    ];
}
}
//return $data2;
 



        $package_same_cat = Packages::with('cat')->with('city')->where('cat_id',$packages_detail->cat_id)->limit(3)->get();
       $galleries = Image::orderBy('id','DESC')->where('package_id',$id)->get();
      
        return view('front.package_detail',compact('packages_detail','package_same_cat','galleries','data2'));

 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function all_packages()
    {




        $themes = Theme::orderBy('id','DESC')->get();
        $cities = City::orderBy('id','DESC')->get();
        $packages = Packages::with('cat')->with('city')->limit(9)->get();
        
        return view('front.all_packages',compact('packages','themes','cities'));
    }
    public function services()
    {
        $services_important = Service::orderBy('id','ASC')->where('status', 1)->where('is_important', 1)->count();
       $services_important = Service::orderBy('id','ASC')->where('status', 1)->where('is_important', 1)->limit($services_important-1)->get();
 $services_important_first = Service::orderBy('id','DESC')->where('status', 1)->where('is_important', 1)->limit(1)->get();

      


        $services_other = Service::orderBy('id','DESC')->where('status', 1)->where('is_important', 0)->get();


        return view('front.services',compact('services_important','services_other','services_important_first'));
    }
    public function aboutus()
    {
        $profiles = Profile::orderBy('id','DESC')->get();

        return view('front.aboutus',compact('profiles'));
    }
    public function contactus()
    {
        $contacts = Contact::orderBy('id','DESC')->limit(1)->get();

        return view('front.contactus',compact('contacts'));
    }
    public function loyality_program()
    {
        $faqs = Faq::orderBy('id','DESC')->where('status',0)->limit(4)->get();
        $terms = Term::orderBy('id','DESC')->get();
        $loyalities = Loyality::limit(3)->where('status',0)->get();

        return view('front.loyalityprogram' ,compact('faqs','terms','loyalities'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
         public function search_in_all_package(Request $r)
    {

        $city_id = $r->input('city_id');
        $theme_id =$r->input('theme_id');
        $flight_from_date =$r->input('flight_from_date');
        $flight_to_date =$r->input('flight_to_date');
        $flight_budget =$r->input('flight_budget');
        $flight_budget_to =$r->input('flight_budget_to');
        $date_1 = str_replace('/', '-', $flight_from_date);
        $date_2 = str_replace('/', '-', $flight_to_date);

       $flight_from_date=  $date_1;
       $flight_to_date = $date_2;



       
        if($flight_from_date && $flight_to_date && $flight_budget && $flight_budget_to)

{
  $packages_best = Packages::with('cat')->with('city')->where('city_id',$city_id)->where('theme_id',$theme_id)->whereDate('depart_date','>=',$flight_from_date)->orWhereDate('revenu_date','<=',$flight_to_date)->whereBetween('price', [$flight_budget, $flight_budget_to])->get();
   return view('front.search_all_packages',compact('packages_best'));

 }
   
          
        if(!$flight_from_date && !$flight_to_date && !$flight_budget && !$flight_budget_to)

{
  $packages_best = Packages::with('cat')->with('city')->where('city_id',$city_id)->where('theme_id',$theme_id)->get();
   return view('front.search_all_packages',compact('packages_best'));
}
        

         if($flight_from_date && !$flight_to_date && !$flight_budget && !$flight_budget_to)

{
  $packages_best = Packages::with('cat')->with('city')->where('city_id',$city_id)->where('theme_id',$theme_id)->whereDate('depart_date','>=',$flight_from_date)->get();
   return view('front.search_all_packages',compact('packages_best'));

 } 


         if($flight_from_date && $flight_to_date && !$flight_budget && !$flight_budget_to)

{
   $packages_best = Packages::with('cat')->with('city')->where('city_id',$city_id)->where('theme_id',$theme_id)->whereDate('depart_date','>=',$flight_from_date)->orWhereDate('revenu_date','<=',$flight_to_date)->get();
   return view('front.search_all_packages',compact('packages_best'));
 } 
 
 if($flight_from_date && $flight_to_date && $flight_budget && !$flight_budget_to)

{
$packages_best = Packages::with('cat')->with('city')->where('city_id',$city_id)->where('theme_id',$theme_id)->whereDate('depart_date','>=',$flight_from_date)->orWhereDate('revenu_date','<=',$flight_to_date)->where('price','<=',$flight_budget)->get();
   return view('front.search_all_packages',compact('packages_best'));
}


     if($flight_from_date && !$flight_to_date && $flight_budget && !$flight_budget_to)

{
  $packages_best = Packages::with('cat')->with('city')->where('city_id',$city_id)->where('theme_id',$theme_id)->whereDate('depart_date','>=',$flight_from_date)->where('price','<=',$flight_budget)->get();
   return view('front.search_all_packages',compact('packages_best'));

 } 
     if(!$flight_from_date && !$flight_to_date && $flight_budget && !$flight_budget_to)

{
  $packages_best = Packages::with('cat')->with('city')->where('city_id',$city_id)->where('theme_id',$theme_id)->where('price','<=',$flight_budget)->get();
   return view('front.search_all_packages',compact('packages_best'));

 } 
 else
 {


    $packages_best = Packages::with('cat')->with('city')->where('city_id',$city_id)->where('theme_id',$theme_id)->get();
   return view('front.search_all_packages',compact('packages_best'));

 }

 
        
    }
}
