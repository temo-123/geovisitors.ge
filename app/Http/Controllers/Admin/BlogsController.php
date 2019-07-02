<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;
use File;

class BlogsController extends Controller
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
        $image_dir = 'blog';

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
            $blog = new Blog();
            $blog -> fill($input);

            if ($blog->save()) {
                return redirect()->route('home') -> with('status', 'blog addid'); //text
            }
        }

        if (view() -> exists('admin.layouts.form')) {
            $data=[
                'title' => 'New page',
                
                'add_form'=>'blogAdd',
                'published' => 1,
                'description' => 1,
                'text' => 1,
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
public function edit(Blog $blog, Request $request)
    {
        $image_dir = 'blog';

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
                $fileName = $blog['image'];
                $destinationPath = 'assets/img/blog/';
                File::delete($destinationPath.$fileName);

                // updete file name in array for add in DB
                $input['image'] = $image_name; 
            }
            else {
                $input['image'] = $input['old_image'];
            }
            unset($input ['old_image']);
            $blog -> fill($input);

            if ($blog->update()) {
                return redirect()->route('home')->with('good_status','blog updated!'); //text
            }
            else{
                return redirect()->route('home')->with('bed_status','Error! blog not updated'); //text
            }
        }

        $old = $blog -> toArray();
        // dd($input);

        if (view()->exists('admin.layouts.form')) {
            $data = [
                'title' => 'Edit news - '.$old['title'],
                'data' => $old,

                'edit_form'=>'blogEdit',
                'published' => 1,
                'description' => 1,
                'text' => 1,
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
    public function destroy(Blog $blog, Request $request)
    {
        if ($request->isMethod('delete')) {
            
            // delete article file
            $fileName = $blog['image'];
            $destinationPath = 'assets/img/blog/';
            File::delete($destinationPath.$fileName);

            // delete article from db
            $blog ->delete();

            return back()->with('good_status', 'blog delited!');
        }
        else{
            return back()->with('bed_status', 'Request error! blog not deleted!');
        }
    }
}
