<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Gallery;
use File;

class GalleriesController extends Controller
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
        $image_dir = 'gallery';

        if ($request -> isMethod('post')) {
            $input = $request -> except('_token');

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
            $gallery = new Gallery();
            $gallery -> fill($input);

            if ($gallery->save()) {
                return redirect()->route('home') -> with('status', 'gallery addid'); //text
            }
        }

        if (view() -> exists('admin.layouts.form')) {
            $data=[
                'title' => 'New page',
                
                'add_form'=>'galleryAdd',
                'published' => 1,
                'image' => $image_dir
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
    public function edit(Gallery $gallery, Request $request)
    {
        $image_dir = 'gallery';

        if ($request->isMethod('post')) {
            $input = $request -> except('_token');

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
                $fileName = $gallery['image'];
                $destinationPath = 'assets/img/gallery/';
                File::delete($destinationPath.$fileName);

                // updete file name in array for add in DB
                $input['image'] = $image_name; 
            }
            else {
                $input['image'] = $input['old_image'];
            }
            unset($input ['old_image']);
            $gallery -> fill($input);

            if ($gallery->update()) {
                return redirect()->route('home')->with('good_status','gallery updated!'); //text
            }
            else{
                return redirect()->route('home')->with('bed_status','Error! gallery not updated'); //text
            }
        }

        $old = $gallery -> toArray();
        // dd($input);

        if (view()->exists('admin.layouts.form')) {
            $data = [
                'title' => 'Edit news - '.$old['title'],
                'data' => $old,

                'edit_form'=>'galleryEdit',
                'published' => 1,
                'image' => $image_dir
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
    public function destroy(Gallery $gallery, Request $request)
    {
        if ($request->isMethod('delete')) {
            
            // delete article file
            $fileName = $gallery['image'];
            $destinationPath = 'assets/img/gallery/';
            File::delete($destinationPath.$fileName);

            // delete article from db
            $gallery ->delete();

            return back()->with('good_status', 'gallery delited!');
        }
        else{
            return back()->with('bed_status', 'Request error! gallery not deleted!');
        }
    }
}
