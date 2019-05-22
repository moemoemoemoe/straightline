<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackageCat;
use App\Packages;
use App\Continent;
use App\Theme;
use App\Hotel;
use App\Image;
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

        $cats = PackageCat::orderBy('id','DESC')->get();
      $hotels = Hotel::with('city')->orderBy('id','DESC')->get();

        $conts = Continent::orderBy('id','DESC')->get();
        $themes = Theme::orderBy('id','DESC')->get();

        return view('package.manage_packages',compact('cats','conts','themes','hotels'));
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
        $hotel_id=$r->input('hotel_id');
        $day=$r->input('day');
        $night =$r->input('night');
        $theme_id=$r->input('theme_id');
        $cont_id=$r->input('cont_id');
        $detailed=$r->input('detailed');
        $map_loc=$r->input('map_loc');
        $depart_date=$r->input('depart_date');
        $revenue_date=$r->input('revenue_date');
        $price =$r->input('price');
        $is_featured=$r->input('is_featured');
        $price_included=$r->input('price_included');
        
        $brochur_url=$r->file('brochur_url');
      $files=$r->file('attachment');

         $data = ['title' => $title , 'cat_id' => $cat_id , 'description' =>$description ,'hotel_id' =>$hotel_id ,'day' =>$day ,'night' =>$night ,'theme_id' =>$theme_id
          ,'cont_id' =>$cont_id ,'detailed' =>$detailed ,'map_loc' =>$map_loc ,'depart_date' =>$depart_date ,'revenue_date' =>$revenue_date ,'price' =>$price ,'is_featured' =>$is_featured ,'price_included' =>$price_included ,'attachment' =>$files];

            $rules = ['title' => 'required' , 'cat_id' => 'required' , 'description' => 'required' , 'hotel_id' => 'required' , 'day' => 'required' , 'night' => 'required' , 'theme_id' => 'required' , 
            'cont_id' => 'required' , 'detailed' => 'required' , 'map_loc' => 'required' , 'depart_date' => 'required' , 'revenue_date' => 'required' , 'price' => 'required' , 'is_featured' => 'required' , 
            'price_included' => 'required' , 'attachment' => 'required' ];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $package = new Packages();
                $package->cat_id  = $cat_id;
                $package->title  =$title ;
                $package->description  = $description;
                $package->hotel_id  =$hotel_id ;
                $package->day  =$day ;
                $package->night  =$night ;
                $package->theme_id  =$theme_id ;
            

                $package->cont_id  =$cont_id ;
                $package->map_loc  =$map_loc ;
                $package->detailed  =$detailed ;
                $package->depart_date  =$depart_date ;
                $package->revenu_date  = $revenue_date;
                $package->price  =$price ;
                $package->is_featured  =$is_featured ;
                $package->price_included  =$price_included ;
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
        return view('package.update_packages',compact('packages','hotels','conts','cats','themes','gallery'));
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
        $day=$r->input('day');
        $night =$r->input('night');
        $theme_id=$r->input('theme_id');
        $cont_id=$r->input('cont_id');
        $detailed=$r->input('detailed');
        $map_loc=$r->input('map_loc');
        $depart_date=$r->input('depart_date');
        $revenue_date=$r->input('revenue_date');
        $price =$r->input('price');
        $is_featured=$r->input('is_featured');
        $price_included=$r->input('price_included');
        
        $brochur_url=$r->file('brochur_url');
      $files=$r->file('attachment');

         $data = ['title' => $title , 'cat_id' => $cat_id , 'description' =>$description ,'hotel_id' =>$hotel_id ,'day' =>$day ,'night' =>$night ,'theme_id' =>$theme_id
          ,'cont_id' =>$cont_id ,'detailed' =>$detailed ,'map_loc' =>$map_loc ,'depart_date' =>$depart_date ,'revenue_date' =>$revenue_date ,'price' =>$price ,'is_featured' =>$is_featured ,'price_included' =>$price_included];

            $rules = ['title' => 'required' , 'cat_id' => 'required' , 'description' => 'required' , 'hotel_id' => 'required' , 'day' => 'required' , 'night' => 'required' , 'theme_id' => 'required' , 
            'cont_id' => 'required' , 'detailed' => 'required' , 'map_loc' => 'required' , 'depart_date' => 'required' , 'revenue_date' => 'required' , 'price' => 'required' , 'is_featured' => 'required' , 
            'price_included' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $package = Packages::findOrFail($id);
                $package->cat_id  = $cat_id;
                $package->title  =$title ;
                $package->description  = $description;
                $package->hotel_id  =$hotel_id ;
                $package->day  =$day ;
                $package->night  =$night ;
                $package->theme_id  =$theme_id ;
            

                $package->cont_id  =$cont_id ;
                $package->map_loc  =$map_loc ;
                $package->detailed  =$detailed ;
                $package->depart_date  =$depart_date ;
                $package->revenu_date  = $revenue_date;
                $package->price  =$price ;
                $package->is_featured  =$is_featured ;
                $package->price_included  =$price_included ;





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
    public function destroy($id)
    {
        //
    }
}
