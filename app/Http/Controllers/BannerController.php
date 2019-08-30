<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\Input;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(2);
        return view('banners.index', compact('banners'))->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $banner= new Banner();

        if( $request->hasFile('image')) {
            $image = $request->file('image');
            
            
            $filename = time() . rand().'.' . $image->getClientOriginalExtension();

            $path = '/banner/'.$filename;

            $destinationpath = public_path(). '/banner/';
            $image->move($destinationpath, $filename);

            $banner->banner_path = $path;
            $banner->status = $request->status;
            $banner->title = $request->title;
            $banner->description = $request->description;
    }


        $banner->save();
        

       return redirect()->route('banners.index')->with('success','Banner created successfully');
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
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('banners.edit',compact('banner'));
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
        $banner = Banner::find($id);
        if($request->hasFile('image'))
        {
            $userImage = public_path().$banner->banner_path;
            
            if (File::exists($userImage)) 
            { 
                unlink($userImage);
            }

            $image = Input::file('image');

            $filename = time() . rand().'.' . $image->getClientOriginalExtension();
            $path = '/banner/'.$filename;

            $destinationpath = public_path(). '/banner/';

            $image->move($destinationpath, $filename);
            $banner->banner_path = $path;
            
        }
        $banner->status = $request->status;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->save();
        return redirect()->route('banners.index')->with('success','banner updated successfully');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image =  \DB::table('banners')->where('id',$id)->first();

        $file= $image->banner_path;
        
        $filename = public_path().$file;

        \File::delete($filename);
        Banner::find($id)->delete();
        return redirect()->route('banners.index')->with('success','Banner deleted successfully');
    }
}


