<?php

namespace Praid\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function execute(){


    	return view('layouts.site');
    }
}