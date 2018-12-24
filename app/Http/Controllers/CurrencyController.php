<?php

namespace Praid\Http\Controllers;

use Illuminate\Http\Request;
use Praid\Currency;
use Praid\Price;
use GuzzleHttp\Client;

class CurrencyController extends Controller
{
    //
    public function execute($alias){

    	$nameCurrency = $alias;
    	$day=14;
    	$startDate = date("Ymd", mktime(0, 0, 0, date('m'), date('d') - $day, date('Y')));
    	$endDate = date("Ymd"); 
    	$currency = Currency::where('name',mb_strtolower($nameCurrency))->get();
    	$currencyID = $currency[0]->id;

    	$priceCurrentID = Price::where('currency_id',$currencyID)->first();
    	$idPriceCurrency = $priceCurrentID->currency_id;
    	
    		if(empty($priceCurrentID)){
    			$data = $this->getDataCurrency($nameCurrency,$startDate,$endDate,$day);
    			$dates = $this->getDataDate($day);
    			for ($i=0; $i <count($data); $i++) { 
    				$input = [
    					'price' => $data[$i],
    					'currency_id' => $currencyID,
    					'Data' => $dates[$i]
    				];
    				$price = new Price();
    				$price->fill($input);
    				$price->save();
    			}

    		}
    		else{

    			$day=1;
    			$flag=FALSE;
    		    $currentDay = $this->getDataDate($day);
    		    $dates = Price::pluck('Data');
    			$data = $this->getDataCurrency($nameCurrency,FALSE,$endDate,FALSE);
    			foreach ($dates as $date) {
    				if($date == $currentDay && $currencyID != $idPriceCurrency){
    					$flag=FALSE;
    					break;
    				}
    				else{
    					$flag=TRUE;
    				}
    			}
    			if($flag){
    				$input = [
    						'price' => $data[0]->rate,
    						'currency_id' => $currencyID,
    						'Data' => $currentDay 
    				];
    				$price = new Price();
    				$price->fill($input);
    				$price->save();

    			}

    		}
    

    		
    		$currencies = Currency::all();
    	return view('site.index',array('currencies' => $currencies));
    }

    public function chart($alias){
    		$nameCurrency = $alias;
    		$currency = Currency::where('name',mb_strtolower($nameCurrency))->get();
    		$currencyID = $currency[0]->id;
    		$currencies = Currency::all();
    		$chart = Price::where('currency_id',$currencyID)->latest('Data')->limit(3)->get();

    		return  response()->json($chart);
    		
    }
    
}
