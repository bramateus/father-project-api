<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller
{
    public function index()
    {




        // FUNÇÃO QUE RETORNA OS 15 DIAS ANTERIOR DA DATA ATUAL
        $fifteen_days = $this->get_15_before_days();


        // FUNÇÃO QUE RETORNA OS 30 DIAS ANTERIOR DA DATA ATUAL
        $thirty_days = $this->get_30_before_days();


        // FUNÇÃO API 15 DIAS - CHAMADA DA API PASSANDO COMO PARAMETRO OS 15 DIAS ANTERIORES
        $api_search_15_days_before = $this->api_15($fifteen_days);


        // FUNÇÃO API 30 DIAS - CHAMADA DA API PASSANDO COMO PARAMETRO OS 30 DIAS ANTERIORES
        $api_search_30_days_before = $this->api_30($thirty_days);


        // SE TIVER CONTEUDO NA DATA PASSADA COMO PARAMETRO CHAMA FUNÇÃO DE SALVAR NO BANCO
        if ($api_search_15_days_before != NULL) {

          if($this->Principal_model->salvaLead($api_search_15_days_before)) {
            print_r('Registros Inseridos - 15 Dias Atras');
            print_r('<br>');
          }

        } else {

          print('15 DIAS ATRAS NÃO HOUVE REGISTROS -> '.$fifteen_days.'');
          print('<br>');

        }

        // SE TIVER CONTEUDO NA DATA PASSADA COMO PARAMETRO CHAMA FUNÇÃO DE SALVAR NO BANCO
        if ($api_search_30_days_before != NULL) {

          if($this->Principal_model->salvaLead($api_search_30_days_before)) {
            print_r('Registros Inseridos - 30 Dias Atras');
            print_r('<br>');
          }

        } else {

          print('30 DIAS ATRAS NÃO HOUVE REGISTROS -> '.$thirty_days.'' );
          print('<br>');

        }








        // print_r($this->Locasms_model->enviarSMS('Teste API PP','31973033012'));



        

       


       

        // if($this->Principal_model->salvaLead($api_search_30_days_before)) {
        //     print_r('Registros Inseridos - 30 Dias Atras');
        //     print_r('<br>');
        // }

        // print_r($api_search_30_days_before);


        // SALVA NO BANCO OS LEADS COM DATA IGUAL A DIA01 E STATUS IGUAL A SIMULAÇÃO ENVIADA
        $leads = $this->teste_api_manualy();
        // print_r('<pre>');
        // print_r($leads);
        // print_r('</pre>');

        // print_r(count($leads));
        if($this->Principal_model->salvaLead($leads)) {
            print_r(count($leads).' Registros Inseridos no Banco ');
            print_r('<br>');
        }



        $tres = 3;
        






         $this->load->template("paginas/calendar", compact("fifteen_days","fifteen_days","tres"));
         // $this->load->template("index", compact("fifteen_days","fifteen_days"));

        // $model[0] = $this->Principal_model->listaDepoimentos();
        // $model[1] = $this->Principal_model->listaParceiros();
        // $dados    = array("depoimentos" => $model[0], "parceiros" => $model[1]);
        // $this->load->template("index", $dados);
        // $this->load->view("index");
    }





    public function get_15_before_days()
    {
        date_default_timezone_set( 'America/Sao_Paulo' );
        $time = new DateTime();
        // print '<pre>'; print_r( $time ); print '</pre>';
        $time -> sub( new DateInterval( 'P15D' ) );
        // print '<pre>'; var_dump( $time, $time -> format( 'Y-m-d' ) ); print '</pre>';
        $time_before_15 = $time->format('Y-m-d');
        // print_r($time_before_15);
        return $time_before_15;

 
    }


    public function get_30_before_days()
    {
        date_default_timezone_set( 'America/Sao_Paulo' );
        $time = new DateTime();
        // print '<pre>'; print_r( $time ); print '</pre>';
        $time -> sub( new DateInterval( 'P30D' ) );
        // print '<pre>'; var_dump( $time, $time -> format( 'Y-m-d' ) ); print '</pre>';
        $time_before_30 = $time->format('Y-m-d');
        // print_r($time_before_30);
        return $time_before_30;
    }

    
    public function api_15($days_before) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://hmg.api.lidery.org.br/leads/buscarLeadMarketing?status_id=8&data_status_fim=".$days_before."&data_status_inicio=".$days_before."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "authorization: Basic bWFya2V0aW5nOnRlc3RlMTIz",
            "cache-control: no-cache",
            "postman-token: 39e8f711-a86b-eaa4-6b53-e868c1378509"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // echo $response;
          return json_decode($response);
        }
    }   



    public function api_30($days_before) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://hmg.api.lidery.org.br/leads/buscarLeadMarketing?status_id=8&data_status_fim=".$days_before."&data_status_inicio=".$days_before."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "authorization: Basic bWFya2V0aW5nOnRlc3RlMTIz",
            "cache-control: no-cache",
            "postman-token: 39e8f711-a86b-eaa4-6b53-e868c1378509"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // echo $response;
          return json_decode($response);
        }
    } 



    



    public function teste_api_manualy() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://hmg.api.lidery.org.br/leads/buscarLeadMarketing?status_id=8&data_status_fim=2019-10-01&data_status_inicio=2019-10-01",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "authorization: Basic bWFya2V0aW5nOnRlc3RlMTIz",
            "cache-control: no-cache",
            // "postman-token: 39e8f711-a86b-eaa4-6b53-e868c1378509"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // echo $response;
          return json_decode($response);
        }
    } 



    



    



    #PAGINAS
    // public function encontros_presenciais()
    // {
    //     $this->load->template('paginas/encontros_presenciais');
    // }

}
