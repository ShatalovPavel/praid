<?php

namespace Praid\Http\Controllers;

use Illuminate\Http\Request;
use Praid\Currency;
use Praid\Price;
use GuzzleHttp\Client;
use Validator;

class PopperController extends Controller
{
    //
    public function __construct(Request $request){
           
    
    }

    public function execute($alias,$id, Request $request){
    	$nameCurrency = $alias;
    	$currencies = Currency::all();
    	$GetDayForURL = array(
                '5'=> 'за 5 дней',
                '7'=> 'за 7 дней',
                '10'=> 'за 10 дней',
                'all'=> 'за все время',
            );

    			
    	return view('site.index',array('currencies' => $currencies,'GetDayForURL' => $GetDayForURL,'nameCurrency' => $nameCurrency));
    }


    public function chart($alias,$id) {
    		$nameCurrency = $alias;
    		$limit=$id;
    		$currency = Currency::where('name',mb_strtolower($nameCurrency))->get();
    		$currencyID = $currency[0]->id;
    		$currencies = Currency::all();		
    		if($limit=='all'){
    			$chart = Price::where('currency_id',$currencyID)->latest('Data')->get();
    		
    		}
    		else{
    			$chart = Price::where('currency_id',$currencyID)->latest('Data')->limit($limit)->get();
    			
    		}

    		return  response()->json($chart);


    		
    }
  
}
