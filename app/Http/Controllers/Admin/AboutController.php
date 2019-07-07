<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\About;
use File;
use Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about, Request $request)
    {
        $image_dir = 'about';
        $header_image_dir = 'about/header_image';
        $site_image_dir = 'about/site_image';

        if ($request->isMethod('post')) {
            $input = $request -> except('_token');

            $validator = validator::make($input, [
                'title' => 'required|max:190',
                'description' => 'required|max:100',
                'text' => 'required',
            ]);
            if ($validator->fails()) {
                return back() -> withErrors($validator) -> withInput();
            }

            // --------------
            // image
            // --------------
            if ($request->hasFile('image')) {

                $file = $request -> file('image');

                //get original file
                $input['image'] = $file -> getClientOriginalName();

                //rename file
                $pieces = explode( '.', $input['image'] );
                $fruit = array_pop($pieces);
                $comma_separated = implode(",", $pieces);
                $image_name = $comma_separated.'_('.date('Y-m-d-H-m-s').').'.$fruit;

                // move fili in derectory
                $file -> move(public_path().'/assets/img/'.$image_dir, $image_name);

                // delite old file
                $fileName = $about['image'];
                
                // dd($fileName);
                $destinationPath = 'assets/img/about/';
                File::delete($destinationPath.$fileName);

                // updete file name for add in DB
                $input['image'] = $image_name; 
            }
            else {
                $input['image'] = $input['old_image'];
            }
            unset($input ['old_image']);
            // $about -> fill($input);

            // --------------
            // header image
            // --------------
            if ($request->hasFile('header_image')) {

                $file = $request -> file('header_image');

                //get original file
                $input['header_image'] = $file -> getClientOriginalName();

                //rename file
                $pieces = explode( '.', $input['header_image'] );
                $fruit = array_pop($pieces);
                $comma_separated = implode(",", $pieces);
                $header_image_name = $comma_separated.'_('.date('Y-m-d-H-m-s').').'.$fruit;

                // move fili in derectory
                $file -> move(public_path().'/assets/img/'.$header_image_dir, $header_image_name);

                // delite old file
                $fileName = $about['header_image'];
                $destinationPath = 'assets/img/about/header_image/';
                // $filePatchForDelated = $destinationPath.$fileName;
                // dd($about['header_image']);
                File::delete($destinationPath.$fileName);

                // updete file name for add in DB
                $input['header_image'] = $header_image_name; 
            }
            else {
                $input['header_image'] = $input['old_header_image'];
            }
            unset($input ['old_header_image']);
            // $about -> fill($input);

            // --------------
            // ssite image
            // --------------
            if ($request->hasFile('site_image')) {

                $file = $request -> file('site_image');

                //get original file
                $input['site_image'] = $file -> getClientOriginalName();

                //rename file
                $pieces = explode( '.', $input['site_image'] );
                $fruit = array_pop($pieces);
                $comma_separated = implode(",", $pieces);
                $site_image_name = $comma_separated.'_('.date('Y-m-d-H-m-s').').'.$fruit;

                // move fili in derectory
                $file -> move(public_path().'/assets/img/'.$site_image_dir, $site_image_name);

                // delite old file
                $fileName = $about['site_image'];
                // dd($about);
                $destinationPath = 'assets/img/about/site_image/';
                File::delete($destinationPath.$fileName);

                // updete file name for add in DB
                $input['site_image'] = $site_image_name; 
            }
            else {
                $input['site_image'] = $input['old_site_image'];
            }
            unset($input ['old_site_image']);
            $about -> fill($input);
            // dd($input);

            if ($about->update()) {
                return redirect()->route('home')->with('good_status','Information about your company updated!');
            }
            else{
                return redirect()->route('home')->with('bed_status','Error! Information about your company not updated!');
            }

        }

        $old = $about -> toArray();

        if (view()->exists('admin.layouts.form')) {
            $data = [
                'title' => 'Edit news - '.$old['title'],
                'data' => $old,

                'edit_form'=>'aboutEdit',
                'site_url' => 1,
                'description' => 1,
                'text' => 1,
                'image' => $image_dir,
                'header_image' => $header_image_dir,
                'site_image' => $site_image_dir,
                'about_service' => 1,
                'about_thure' => 1,
                'about_gallery' => 1,
                'about_blog' => 1,
                'social' => 1,
                'mail' => 1,
                'num' => 1
            ];          
            return view('admin.layouts.form', $data);
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
