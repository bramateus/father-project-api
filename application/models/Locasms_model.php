<?php

class Locasms_model extends CI_Model
{

	 // 31986325604
	 // 797467 //R$ VIZAR 0,06 cents

	//	31994107877
	//	223831 //R$ SERAPH 0,03 cents

	function __construct() {
        $this->login = '31994107877';
        $this->senha = '2238310';
    }
    
    function enviarSMS($msg, $numeros, $callback = '', $jobdata = '', $jobtime = ''){
        $this->msg    = $msg;
        $this->numeros = $numeros;
        $this->callback = $callback;
        $this->jobdata  = $jobdata;
        $this->jobtime  = $jobtime;
        $requestData = array(
            'lgn'           => $this->login,
            'pwd'           => $this->senha,
            'msg'           => $this->msg,
            'numbers'       => $this->numeros
        );
        
        if ($this->callback != '') {            
            $requestData['callback'] = $this->callback;
        }
        if ($this->jobdata != '') {            
            $requestData['jobdata'] = $this->jobdata;
        }
        if ($this->jobtime != '') {            
            $requestData['jobtime'] = $this->jobtime;
        }       
        return $this->request('sendsms', $requestData);
    } 


    function request($urlSufix, $data) {

    	$url = "http://209.133.205.2/painel/api.ashx"; //R$ 0,03
    	// $url = "http://209.133.205.2/shortcode/api.ashx"; //R$ 0,06
        $curl = curl_init(); 
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.'?action='.$urlSufix,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "UTF-8",
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => http_build_query($data) . "\n",
            CURLOPT_HTTPHEADER => $data
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        print_r($response);
        print_r('<br>');
        return $response;
    }



}