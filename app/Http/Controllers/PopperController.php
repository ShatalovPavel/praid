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
    protected $StartDate;
    protected $EndDate;

    public function __construct(Request $request){

        $data = $request->query('dates');
        if(!empty($data)){
            $date = explode('-',$data);
            $date[0]=date_create(trim($date[0]));
            $date[1]=date_create(trim($date[1]));
            $this->StartDate = date_format($date[0],'Y-m-d');
            $this->EndDate = date_format($date[1],'Y-m-d');


        }
    
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
            else if($limit=='dates'){
                $chart = Price::where('currency_id',$currencyID)->where('Data','>=',$this->StartDate)->where('Data','<=',$this->EndDate)->get();
            }
    		else{
    			$chart = Price::where('currency_id',$currencyID)->latest('Data')->limit($limit)->get();
    			
    		}

    		return  response()->json($chart);


    		
    }
  
}
