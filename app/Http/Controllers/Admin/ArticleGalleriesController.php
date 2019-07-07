<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

use App\Article_gallery;
use App\Tour;
use App\Service;
use File;

class ArticleGalleriesController extends Controller
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
        $image_dir = 'article_gallery';

        if ($request -> isMethod('post')) {
            $input = $request -> except('_token');

            $validator = validator::make($input, [
                'title' => 'required|max:190',
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
            $article_gallery = new Article_gallery();
            $article_gallery -> fill($input);

            if ($article_gallery->save()) {
                return redirect()->route('home') -> with('status', 'article_gallery addid'); //text
            }
        }
        $tours = Tour::get();
        $services = Service::get();
        if (view() -> exists('admin.layouts.form')) {
            $data=[
                'title' => 'New page',

                'tours' => $tours,
                'services' => $services,
                
                'article' => 1,
                'add_form'=>'article_galleryAdd',
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
    public function edit(Article_Gallery $article_gallery, Request $request)
    {
        $image_dir = 'article_gallery';

        if ($request->isMethod('post')) {
            $input = $request -> except('_token');

            $validator = validator::make($input, [
                'title' => 'required|max:190',
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
                $fileName = $article_gallery['image'];
                $destinationPath = 'assets/img/article_gallery/';
                File::delete($destinationPath.$fileName);

                // updete file name in array for add in DB
                $input['image'] = $image_name; 
            }
            else {
                $input['image'] = $input['old_image'];
            }
            unset($input ['old_image']);
            $article_gallery -> fill($input);

            if ($article_gallery->update()) {
                return redirect()->route('home')->with('good_status','article_gallery updated!'); //text
            }
            else{
                return redirect()->route('home')->with('bed_status','Error! article_gallery not updated'); //text
            }
        }

        $old = $article_gallery -> toArray();
        // dd($input);

        $tours = Tour::get();
        $services = Service::get();
        if (view()->exists('admin.layouts.form')) {
            $data = [
                'title' => 'Edit news - '.$old['title'],
                'data' => $old,

                'tours' => $tours,
                'services' => $services,
                
                'article' => 1,
                'edit_form'=>'article_galleryEdit',
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
    public function destroy(Article_Gallery $article_gallery, Request $request)
    {
        if ($request->isMethod('delete')) {
            
            // delete article file
            $fileName = $article_gallery['image'];
            $destinationPath = 'assets/img/article_gallery/';
            File::delete($destinationPath.$fileName);

            // delete article from db
            $article_gallery ->delete();

            return back()->with('good_status', 'article_gallery delited!');
        }
        else{
            return back()->with('bed_status', 'Request error! article_gallery not deleted!');
        }
    }
}
