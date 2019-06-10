<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;

class LoadMoreController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    function load_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->id > 0)
      {
       $data = Packages::with('cat')->with('city')
          ->orderBy('id', 'DESC')
           ->where('id', '<', $request->id)
          ->limit(6)
          ->get();
      }
      else
      {
       $data = Packages::with('cat')->with('city')
          ->orderBy('id', 'DESC')
          ->limit(6)
          ->get();
      }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
       foreach($data as $row)
       {
       	if($row->city->country->continent->id == 1)
       	{
        $output .= '
         <div class="col-lg-4 asia">
          <a href="package_detail/'.$row->id.'">
            <div class="featured_pck">
              <div class="pck_img">
                <img src="uploads/packages/'.$row->main_image.'" alt="" class="" style="width: 324px"/>
                <div class="pck_type text-uppercase"><i>'.$row->cat->cat_name.'</i></div>
              </div>
              <div class="pt-3 home_pck_details">
                <h3 class="pck_title pl-3">'.$row->title.'</h3>
                <div class="pck_continent mt-3 pb-2 mb-2">'.$row->city->country->continent->cont_name.'</div>
                <div class="pck_starting px-3 pt-1 w-100 d-flex justify-content-between align-items-center">
                  <div class="start_price">
                    <div class="pck_price">$'.$row->price.'</div>
                    <div class="pck_price_days">'.$row->night.' nights / '.$row->day.' days</div>
                  </div>
                  <div class="">
                    <button class="text-uppercase font-weight-bold pck_details_btn">Details</button>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        ';
         $last_id = $row->id;
    }
    if($row->city->country->continent->id == 4)
    {$output .= '
         <div class="col-lg-4 middle_east_and_africa">
          <a href="package_detail/'.$row->id.'">
            <div class="featured_pck">
              <div class="pck_img">
                <img src="uploads/packages/'.$row->main_image.'" alt="" class="" style="width: 324px"/>
                <div class="pck_type text-uppercase"><i>'.$row->cat->cat_name.'</i></div>
              </div>
              <div class="pt-3 home_pck_details">
                <h3 class="pck_title pl-3">'.$row->title.'</h3>
                <div class="pck_continent mt-3 pb-2 mb-2">'.$row->city->country->continent->cont_name.'</div>
                <div class="pck_starting px-3 pt-1 w-100 d-flex justify-content-between align-items-center">
                  <div class="start_price">
                    <div class="pck_price">$'.$row->price.'</div>
                    <div class="pck_price_days">'.$row->night.' nights / '.$row->day.' days</div>
                  </div>
                  <div class="">
                    <button class="text-uppercase font-weight-bold pck_details_btn">Details</button>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        ';
     $last_id = $row->id;}
       
     
       if($row->city->country->continent->id == 2)
    {$output .= '
         <div class="col-lg-4 europe">
          <a href="package_detail/'.$row->id.'">
            <div class="featured_pck">
              <div class="pck_img">
                <img src="uploads/packages/'.$row->main_image.'" alt="" class="" style="width: 324px"/>
                <div class="pck_type text-uppercase"><i>'.$row->cat->cat_name.'</i></div>
              </div>
              <div class="pt-3 home_pck_details">
                <h3 class="pck_title pl-3">'.$row->title.'</h3>
                <div class="pck_continent mt-3 pb-2 mb-2">'.$row->city->country->continent->cont_name.'</div>
                <div class="pck_starting px-3 pt-1 w-100 d-flex justify-content-between align-items-center">
                  <div class="start_price">
                    <div class="pck_price">$'.$row->price.'</div>
                    <div class="pck_price_days">'.$row->night.' nights / '.$row->day.' days</div>
                  </div>
                  <div class="">
                    <button class="text-uppercase font-weight-bold pck_details_btn">Details</button>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        ';
     $last_id = $row->id;}
       
    
       if($row->city->country->continent->id == 3)
    {$output .= '
         <div class="col-lg-4 north_america">
          <a href="package_detail/'.$row->id.'">
            <div class="featured_pck">
              <div class="pck_img">
                <img src="uploads/packages/'.$row->main_image.'" alt="" class="" style="width: 324px"/>
                <div class="pck_type text-uppercase"><i>'.$row->cat->cat_name.'</i></div>
              </div>
              <div class="pt-3 home_pck_details">
                <h3 class="pck_title pl-3">'.$row->title.'</h3>
                <div class="pck_continent mt-3 pb-2 mb-2">'.$row->city->country->continent->cont_name.'</div>
                <div class="pck_starting px-3 pt-1 w-100 d-flex justify-content-between align-items-center">
                  <div class="start_price">
                    <div class="pck_price">$'.$row->price.'</div>
                    <div class="pck_price_days">'.$row->night.' nights / '.$row->day.' days</div>
                  </div>
                  <div class="">
                    <button class="text-uppercase font-weight-bold pck_details_btn">Details</button>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        ';
     $last_id = $row->id;}
     
       }
       $output .= ' </div>
   </div>
       <div class="col-lg-12 text-center mt-4 text-uppercase " id="load_more">
        <button type="button" name="load_more_button"  class="btn btn-allpacks font-weight-bold" id="load_more_button" data-id="'.$last_id.'" id="load_more_button" style = "color:#fff">Load More</button>
       </div>
       </div>
       ';
      }
      else
      {
       $output .= '
     
       <div class="col-lg-12 text-center mt-4 text-uppercase " id="load_more">
        <button type="button" name="load_more_button"  class="btn btn-allpacks font-weight-bold" id="load_more_button" style = "color:#fff">No Data Found</button>
       </div>
       ';
      }
      echo $output;
     }
    }
}

