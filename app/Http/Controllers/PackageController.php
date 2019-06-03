<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackageCat;
use App\Packages;
use App\Continent;
use App\Theme;
use App\Hotel;
use App\Image;
use App\City;
use Validator;
use Redirect;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_package()
    {

      $cats = PackageCat::orderBy('id','DESC')->where('status',1)->get();
      $hotels = Hotel::with('city')->orderBy('id','DESC')->get();

       $cities = City::orderBy('id' , 'DESC')->get();
        $themes = Theme::orderBy('id','DESC')->where('status',1)->get();

        return view('package.manage_packages',compact('cats','themes','hotels','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_package_save(Request $r)
    {



        $title = $r->input('title');
        $cat_id=$r->input('cat_id');
        $description=$r->input('description');
        $execluded=$r->input('execluded');
        $hotel_id=$r->input('hotel_id');
        $city_id = $r->input('city_id'); 
        $map_loc = "00000,00000";
        $day=$r->input('day');
        $night =$r->input('night');
        $theme_id=$r->input('theme_id');
        $detailed=$r->input('detailed');
        $depart_date=$r->input('depart_date');
        $revenue_date=$r->input('revenue_date');
        $price =$r->input('price');
        $is_featured=$r->input('is_featured');
        $price_included=$r->input('price_included');
        
        $brochur_url=$r->file('brochur_url');
      $files=$r->file('attachment');

         $data = ['title' => $title , 'cat_id' => $cat_id , 'description' =>$description ,'hotel_id' =>$hotel_id ,'day' =>$day ,'night' =>$night ,'theme_id' =>$theme_id  ,'depart_date' =>$depart_date ,'revenue_date' =>$revenue_date ,'price' =>$price ,'is_featured' =>$is_featured ,'price_included' =>$price_included ,'attachment' =>$files,'execluded' =>$execluded];

            $rules = ['title' => 'required' , 'cat_id' => 'required' , 'description' => 'required' , 'hotel_id' => 'required' , 'day' => 'required' , 'night' => 'required' , 'theme_id' => 'required'  , 'depart_date' => 'required' , 'revenue_date' => 'required' , 'price' => 'required' , 'is_featured' => 'required' , 
            'price_included' => 'required' , 'attachment' => 'required' , 'execluded' => 'required' ];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            { 
                $city_cont = City::with('country')->where('id', $city_id)->get();
                $cont_id = $city_cont[0]->country->continent->id;
if($hotel_id == 0 || $hotel_id == -1)
{
     $map_loc = "00000,00000";
}
else
{
                $data_by_hotel_id = Hotel::where('id', $hotel_id)->get();
$map_loc = $data_by_hotel_id[0]->coor_x.",".$data_by_hotel_id[0]->coor_y;

}
                $package = new Packages();
                $package->cat_id  = $cat_id;
                $package->title  =$title ;
                $package->description  = $description;
                $package->hotel_id  =$hotel_id ;
                $package->day  =$day ;
                $package->night  =$night ;
                $package->theme_id  =$theme_id ;
                $package->city_id =$city_id;

                $package->cont_id  =$cont_id ;
                $package->map_loc  =$map_loc ;
                if($detailed == '')
                {
                     $package->detailed  ="No Data" ;
                }
                else
                {
                $package->detailed  =$detailed ;
            }
                $package->depart_date  =$depart_date ;
                $package->revenu_date  = $revenue_date;
                $package->price  =$price ;
                $package->is_featured  =$is_featured ;
                $package->price_included  =$price_included ;
                $package->price_execluded  =$execluded ;
                $package->status = 0;





     if($r->hasFile('brochur_url')){
 $rand = mt_rand(111111,999999);
$destination = 'uploads/brochure';
            $photo_name = str_replace(' ', '_', $rand);
            $photo_name .= '.'.$brochur_url->getClientOriginalExtension();
            $brochur_url->move($destination, $photo_name);
             $package->brochur_url = $photo_name;

            }
            else
            {
 $package->brochur_url = " ";

            }



          if ($files[0] != '') {
        $image_name = array();
        foreach($files as $file) {
         $ran = mt_rand(111111,999999);
         $destinationPath = 'uploads/packages';
         $filename = $file->getClientOriginalExtension();
         $filename_r =$ran.'.'.$filename;
         $image_name[] = $filename_r;
         $file->move($destinationPath, $filename_r);
       }
     }
  $package->main_image  =$image_name[0];
  $package->save();
for($i=0;$i<count($image_name);$i++){
      $gallery = new Image();
      $gallery->package_id= $package->id;
      $gallery->img_url = $image_name[$i];
       
      $gallery->save();
    }
     return Redirect::back()->with('success', 'New Package successfuly Created');
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view_packages()
    {
        $packages = Packages::orderBy('id','DESC')->get();
       
        return view('package.view_packages',compact('packages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function package_update($id)
    {
          $packages = Packages::findOrFail($id);
         $hotels = Hotel::with('city')->orderBy('id','DESC')->get();
        $conts =Continent::orderBy('id','DESC')->get();
        $cats = PackageCat::orderBy('id','DESC')->get();
        $themes = Theme::orderBy('id','DESC')->get();
        $gallery = Image::where('package_id',$id)->get();
        $cities = City::orderBy('id','DESC')->get();
        return view('package.update_packages',compact('packages','hotels','conts','cats','themes','gallery','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_gallery($id)
    {
         $image = Image::findOrFail($id);
            $image->delete();
            // unlink('uploads/packages/'.$image->img_url);
            return Redirect::Back()->with('success', 'This  Image is  Successfully Deleted');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function package_update_save(Request $r, $id)
    {
         $title = $r->input('title');
         $cat_id=$r->input('cat_id');
         $description=$r->input('description');

        $hotel_id=$r->input('hotel_id');
        $city_id = $r->input('city_id'); 
        $map_loc = "00000,00000";
        $day=$r->input('day');
        $night =$r->input('night');
        $theme_id=$r->input('theme_id');
        $detailed=$r->input('detailed');
        $depart_date=$r->input('depart_date');
        $revenue_date=$r->input('revenue_date');
        $price =$r->input('price');
        $is_featured=$r->input('is_featured');
        $price_included=$r->input('price_included');
     $execluded=$r->input('execluded');

        
        $brochur_url=$r->file('brochur_url');
      $files=$r->file('attachment');

         $data = ['title' => $title , 'cat_id' => $cat_id , 'description' =>$description ,'hotel_id' =>$hotel_id ,'day' =>$day ,'night' =>$night ,'theme_id' =>$theme_id  ,'depart_date' =>$depart_date ,'revenue_date' =>$revenue_date ,'price' =>$price ,'is_featured' =>$is_featured ,'price_included' =>$price_included ,'execluded' =>$execluded];

            $rules = ['title' => 'required' , 'cat_id' => 'required' , 'description' => 'required' , 'hotel_id' => 'required' , 'day' => 'required' , 'night' => 'required' , 'theme_id' => 'required'  , 'depart_date' => 'required' , 'revenue_date' => 'required' , 'price' => 'required' , 'is_featured' => 'required' , 
            'price_included' => 'required', 'execluded' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {

 
                $city_cont = City::with('country')->where('id', $city_id)->get();
                $cont_id = $city_cont[0]->country->continent->id;
if($hotel_id == 0 || $hotel_id == -1)
{
     $map_loc = "00000,00000";
}
else
{
                $data_by_hotel_id = Hotel::where('id', $hotel_id)->get();
$map_loc = $data_by_hotel_id[0]->coor_x.",".$data_by_hotel_id[0]->coor_y;

}

                $package = Packages::findOrFail($id);
                $package->cat_id  = $cat_id;
                $package->title  =$title ;
                $package->description  = $description;
                $package->hotel_id  =$hotel_id ;
                $package->day  =$day ;
                $package->night  =$night ;
                $package->theme_id  =$theme_id ;
                $package->city_id =$city_id;

                $package->cont_id  =$cont_id ;
                $package->map_loc  =$map_loc ;
                if($detailed == '')
                {
                     $package->detailed  ="No Data" ;
                }
                else
                {
                $package->detailed  =$detailed ;
            }
                $package->depart_date  =$depart_date ;
                $package->revenu_date  = $revenue_date;
                $package->price  =$price ;
                $package->is_featured  =$is_featured ;
                $package->price_included  =$price_included ;
                 $package->price_execluded  =$execluded;



     if($r->hasFile('brochur_url')){
 $rand = mt_rand(111111,999999);
$destination = 'uploads/brochure';
            $photo_name = str_replace(' ', '_', $rand);
            $photo_name .= '.'.$brochur_url->getClientOriginalExtension();
            $brochur_url->move($destination, $photo_name);
             $package->brochur_url = $photo_name;

            }
          



          if ($files[0] != '') {
        $image_name = array();
        foreach($files as $file) {
         $ran = mt_rand(111111,999999);
         $destinationPath = 'uploads/packages';
         $filename = $file->getClientOriginalExtension();
         $filename_r =$ran.'.'.$filename;
         $image_name[] = $filename_r;
         $file->move($destinationPath, $filename_r);
       }
     }
  $package->save();
    if ($files[0] != '') {
for($i=0;$i<count($image_name);$i++){
      $gallery = new Image();
      $gallery->package_id= $id;
      $gallery->img_url = $image_name[$i];
       
      $gallery->save();
  }
    }
     return Redirect::back()->with('success', 'New Package successfuly Updated');
    }
}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_hotels(Request $r)
    {
      $id = $r->input('city_id');
      //return $id;
      $hotels =Hotel::select('id','name')->where('city_id',$id)->get();
      $response = json_decode($hotels, true);
      
      return $response;
    }
}
