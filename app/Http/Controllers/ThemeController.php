<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;

use Validator;
use Redirect;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_themes()
    {
        $themes = Theme::orderBy('id','DESC')->get();
        return view('themes.add_theme',compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_themes_save(Request $r)
    {
       $theme_name = $r->input('theme_name');

         $data = ['theme_name' => $theme_name];

            $rules = ['theme_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $cat_exist = Theme::where('theme_name',$theme_name)->count();

if($cat_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate Theme Name")->withInput($r->input());


} else
{

                  $them = new Theme();
                  $them->theme_name = $theme_name;
                  $them->status = 0;
               
               
                $them->save();
      return Redirect::Back()->with('success', 'Theme  added successfully');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish_theme($id)
    {
       $main = Theme::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Theme is Published');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Theme is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_theme($id)
    {
        
          $themes = Theme::findOrFail($id);
        return view('themes.theme_update',compact('themes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_theme_save(Request $r, $id)
    {
         $theme_name = $r->input('theme_name');

         $data = ['theme_name' => $theme_name];

            $rules = ['theme_name' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v)->withInput($r->input());
            }
            else
            {
                $cat_exist = Theme::where('theme_name',$theme_name)->count();

if($cat_exist > 0)
{
                return Redirect::Back()->withErrors("Error : Duplicate Theme Name")->withInput($r->input());


} else
{

                  $them =Theme::findOrFail($id);
                  $them->theme_name = $theme_name;
              
               
               
                $them->save();
      return Redirect::Back()->with('success', 'Theme  Updated successfully');
            }
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
