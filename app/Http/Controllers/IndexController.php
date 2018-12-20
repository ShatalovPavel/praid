<?php

namespace Praid\Http\Controllers;

use Illuminate\Http\Request;

use Praid\Currency;
use Praid\Price;

class IndexController extends Controller
{
    //
    public function execute(){
    	
    	if(view()->exists('layouts.site')){
    		$currencies = Currency::all();
    }





    	return view('site.index',array('currencies' => $currencies));
    }
}
