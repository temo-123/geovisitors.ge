<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tour;
use App\Service;
use File;

class ToursController extends Controller
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
    public function create(Request $request)
    {
        $image_dir = 'tour';

        if ($request -> isMethod('post')) {
            $input = $request -> except('_token');

            $validator = validator::make($input, [
                'title' => 'required|max:190',
                'description' => 'required|max:100',
                'text' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($validator->fails()) {
                return back() -> withErrors($validator) -> withInput();
            }

            if ($request->hasFile('image')) {
                
                $file = $request -> file('image');

                //get original file
                $input['image'] = $file -> getClientOriginalName();

                // rename file
                $pieces = explode( '.', $input['image'] );
                $fruit = array_pop($pieces);
                $comma_separated = implode(",", $pieces);
                $image_name = $comma_separated.'_('.date('Y-m-d-H-m-s').').'.$fruit;

                // move fili in derectory
                $file -> move(public_path().'/assets/img/'.$image_dir, $image_name);

                // updete file name for add in DB
                $input['image'] = $image_name; 
            }
            $tour = new Tour();
            $tour -> fill($input);

            if ($tour->save()) {
                return redirect()->route('home') -> with('status', 'tour addid'); //text
            }
        }
        $services = Service::get();
        if (view() -> exists('admin.layouts.form')) {
            $data=[
                'title' => 'New page',
                
                'add_form'=>'tourAdd',
                'published' => 1,
                'description' => 1,
                'text' => 1,
                'image' => $image_dir,
                'categories' => $services,
            ];
            // dd($data);
            return view('admin.layouts.form', $data);
        }
        abort(404);
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
    public function edit(Tour $tour, Request $request)
    {
        $image_dir = 'tour';

        if ($request->isMethod('post')) {
            $input = $request -> except('_token');

            $validator = validator::make($input, [
                'title' => 'required|max:190',
                'description' => 'required|max:100',
                'text' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($validator->fails()) {
                return back() -> withErrors($validator) -> withInput();
            }

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
                $fileName = $tour['image'];
                $destinationPath = 'assets/img/tour/';
                File::delete($destinationPath.$fileName);

                // updete file name in array for add in DB
                $input['image'] = $image_name; 
            }
            else {
                $input['image'] = $input['old_image'];
            }
            unset($input ['old_image']);
            $tour -> fill($input);

            if ($tour->update()) {
                return redirect()->route('home')->with('good_status','tour updated!'); //text
            }
            else{
                return redirect()->route('home')->with('bed_status','Error! tour not updated'); //text
            }
        }

        $old = $tour -> toArray();
        // dd($input);

        $services = Service::get();
        if (view()->exists('admin.layouts.form')) {
            $data = [
                'title' => 'Edit news - '.$old['title'],
                'data' => $old,

                'edit_form'=>'tourEdit',
                'published' => 1,
                'description' => 1,
                'text' => 1,
                'image' => $image_dir,
                'categories' => $services,
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
    public function destroy(Tour $tour, Request $request)
    {
        if ($request->isMethod('delete')) {

            // delete article file
            $fileName = $tour['image'];
            $destinationPath = 'assets/img/tour/';
            File::delete($destinationPath.$fileName);

            // delete article from db
            $tour ->delete();

            return back()->with('good_status', 'tour delited!');
        }
        else{
            return back()->with('bed_status', 'Request error! tour not deleted!');
        }
    }
}
