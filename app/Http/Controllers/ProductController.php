<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Attribute;
use App\Attributevalue;
use App\ProductAssoc;
use File;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::with('childs')->get();
        $products = Product::latest()->paginate(2);

        return view('products.index', compact('products','pro'))->with('i',(request()->input('page',1) -1) *5);
    }

    public function myformAjax($id)
    {
        $values = DB::table("product_attribute_values")
                ->where("product_attribute_id",$id)
                ->pluck("attribute_value","id");
        return json_encode($values);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = DB::table("product_attributes")->pluck("name","id");
        $attrn = Attribute::all()->sortBy('name')->all();
        $attvalue = Attributevalue::all()->sortBy('attribute_value')->all();
        return view('products.create', compact('attrn','attvalue','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        // echo "<pre>";
        // print_r($request->all());exit(); "</pre>";
        
        $product= new Product();

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->short_description = $request->shortdes;
        $product->long_description = $request->longdes;
        $product->price = $request->price;
        $product->special_price = $request->specialprice;
        $product->special_price_from = $request->specialpricefrom;
        $product->special_price_to = $request->specialpriceto;
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->meta_title = $request->metatitle;
        $product->meta_description = $request->metades;
        $product->meta_keywords = $request->metakey;
        $product->is_featured = $request->statusfeat;

        $product->save();

        if( $request->hasFile('image')) 
        {
          $files =  $request->file('image');

            foreach ($files as $image) 
            {
                $imagesobj= new ProductImage();
               
                $filename = $image->getClientOriginalName();
            
                $image->move(public_path().'/uploads/', $filename);

                $imagesobj->image_name=$filename;
                $imagesobj->product_id = $product->id;
                $imagesobj->status = $request->status;
                $imagesobj->save();
            }
        }

        $attrinput =  $request->product_attribute;
        $attrin = $request->product_attribute_value;
        foreach ($attrinput as $key => $item )
        {
            $attr = new ProductAssoc();
            $attr->product_id = $product->id;
            $attr->product_attribute_id = $attrinput[$key];
            $attr->product_attribute_value_id = $attrin[$key];
        
            $attr->save();
        }
       return redirect()->route('products.index')->with('success','Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pro = Product::with('childs')->get();
        $products = Product::all();
        $product = Product::find($id);

        $img = ProductImage::find($id);

        $attributes = DB::table("product_attributes")->pluck("name","id");
        $attrn = Attribute::all()->sortBy('name')->all();
        $attvalue = Attributevalue::all()->sortBy('attribute_value')->all();
        
        return view('products.edit',compact('product','img','pro','products','attributes','attrn','attvalue'));
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
        // $img = ProductImage::find($id);

        // if( $request->hasFile('image')) 
        // {
        //     $userimage = $img->image_name;

        //     if (File::exists($userimage)) 
        //     { 
        //         unlink($userimage);
        //     }

        //     $image = Input::file('image');
        //     $filename = $image->getClientOriginalName();
        //     $image->move(public_path().'/uploads/', $filename);
        //     $img->image_name=$filename;
        //     $img->product_id = $product->id;
        //     $img->status = $request->status;
                

        // }
        // $img->save();

        Product::find($id)->update($request->all());
        return redirect()->route('products.index')->with('success','Product updated successfully');
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
