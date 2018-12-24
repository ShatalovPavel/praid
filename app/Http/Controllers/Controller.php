<?php

namespace Praid\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     

   public function getDataCurrency($nameCurrency,$startDate=FALSE,$endDate,$day=FALSE){
     	
     	$rates= array();

     	if($startDate){
     		while($startDate!=$endDate){
     				$day--;
     				$linkKeyEndDate ='https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode='.$nameCurrency.'&date='.$startDate.'&json';
     				$client = new Client([
    								'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
    									]);
    				$response = $client->request('GET',$linkKeyEndDate);
    				$data = $response->getBody();
    				$data = json_decode($data);
    				$item =  $data[0]->rate;
    				array_push($rates,round($item,2));
    				$startDate = date("Ymd", mktime(0, 0, 0, date('m'), date('d') - $day, date('Y')));
    				
     		}
     		return $rates;

     	}
     	else{

     		$linkKeyEndDate ='https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode='.$nameCurrency.'&date='.$endDate.'&json'; 
     		$client = new Client([
    		'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
    	]);
    	$response = $client->request('GET',$linkKeyEndDate);
    	$data = $response->getBody();
    	
    	$data = json_decode($data);

    		return $data;
     	}	
    }

    public function getDataDate($day){
    	$date = array();
    	if($day==1){
    		$endDate = date("Y-m-d"); 
    		return $endDate;
    	}else{
    	$startDate = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d') - $day, date('Y')));
    	$endDate = date("Y-m-d");
    	while($startDate!=$endDate){

    				$day--;
    				$startDate = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d') - $day, date('Y')));
    				array_push($date,$startDate);
    				


    	}
    	return $date;
    	}

    }

}
