<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configurations = Configuration::latest()->paginate(2);
        return view('configurations.index',compact('configurations'))->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configurations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Configuration::create([
            'conf_key' => $request->confkey,
            'conf_value' => $request->confvalue,
            'status' => $request->status
        ]);
       return redirect()->route('configurations.index')->with('success','Configuration created successfully');    
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
        $configuration = Configuration::find($id);

        return view('configurations.edit',compact('configuration'));
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
        request()->validate([
            'conf_key' => 'required',
            'conf_value' => 'required',
            'status' => 'required'
        ]);
        Configuration::find($id)->update($request->all());
        return redirect()->route('configurations.index')->with('success','Configuration updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Configuration::find($id)->delete();  
        return redirect()->route('configurations.index')->with('success','Configuration deleted successfully');
    }
}
