<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class FrontendController extends Controller
{
    public function index()
    {
    	$banners = Banner::getBanner();
    	return view('frontend.index',compact('banners'));

    }

    public function sidebar()
    {
    	$categ = Category::getCategory();
    	return view('frontend.sidebar',compact('categ'));
    }
}
