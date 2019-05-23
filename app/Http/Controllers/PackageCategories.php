<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackageCat;
use paginate;
use Validator;
use Redirect;

class PackageCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_package_categories()
    {
        $allcats = PackageCat::orderBy('id','DESC')->paginate(3);
        return view('package.package_cat',compact('allcats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_package_categories_save(Request $r)
    {
         $cat_name = $r->input('cat_name');

         $data = ['cat_name' => $cat_name];

            $rules = ['cat_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $cat_exist = PackageCat::where('cat_name',$cat_name)->count();

if($cat_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate Category Name")->withInput($r->input());


} else
{

                  $package_cat = new PackageCat();
                  $package_cat->cat_name = $cat_name;
                  $package_cat->status = 0;
               
               
                $package_cat->save();
      return Redirect::Back()->with('success', 'Package categories  added successfully');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function publish_cat($id)
    {
     $main = PackageCat::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Category is Published');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Category is Unpublished');
    }
  }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_cat($id)
    {
         $categories = PackageCat::findOrFail($id);
        return view('package.package_cat_update',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_cat_save($id,Request $r)
    {
        
 $cat_name = $r->input('cat_name');

         $data = ['cat_name' => $cat_name];

            $rules = ['cat_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $cat_exist = PackageCat::where('cat_name',$cat_name)->count();

if($cat_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate Category Name")->withInput($r->input());


} else
{

                  $package_cat = PackageCat::findOrFail($id);
                  $package_cat->cat_name = $cat_name;
                
               
               
                $package_cat->save();
      return Redirect::Back()->with('success', 'Package categories  updated successfully');
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
