<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\Attributevalue;

class ProductAttribute extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Attribute::with('childs')->get();
        $attributes = Attribute::latest()->paginate(2);

        return view('attributes.index', compact('attributes','pro'))->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categorys = Attribute::all()->sortByDesc('name')->all();
        // print_r($categorys);exit();
        return view('attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $attr = new Attribute();
        $attr->name = $request->attributename;
        $attr->save();

        $vals = $request->get('attributevalue');
        
        foreach ($vals as  $val)
        {
            $valobj = new Attributevalue();
            $valobj->attribute_value = $val;
            $valobj->product_attribute_id = $attr->id;
            $valobj->save();
        }
       return redirect()->route('attributes.index')->with('success','Attribute created successfully');    
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
        $attribute = Attribute::find($id);

        $value = Attributevalue::find($id);
        
        return view('attributes.edit',compact('attribute'));
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
            'name' => 'required'
        ]);
        Attribute::find($id)->update($request->all());
        return redirect()->route('attributes.index')->with('success','Attribute updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attribute::find($id)->delete();  
        return redirect()->route('attributes.index')->with('success','Attribute deleted successfully');
    }
}
