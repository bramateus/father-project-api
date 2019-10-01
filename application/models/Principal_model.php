<?php

class Principal_model extends CI_Model
{
    // private $instituicao = 1;

    // public function listaDepoimentos()
    // {
    //     return $this->db
    //         ->where("instituicao_id_instituicao", $this->instituicao)
    //         ->get("depoimentos")
    //         ->result_array();
    // }

    // public function listaParceiros()
    // {
    //     return $this->db
    //         ->where("uploadArquivos_identificador", "parceiro")
    //         ->where("instituicao_id_instituicao", $this->instituicao)
    //         ->get("uploadArquivos")
    //         ->result_array();
    // }


    public function salvaLead($leads)
    {
     
        foreach ($leads as $i => $value) {

            $id                  = $leads[$i]->Lead->id;
            $nome                = $leads[$i]->Lead->nome;
            $telefone            = $leads[$i]->Lead->telefone;
            $celular             = $leads[$i]->Lead->celular;
            $email               = $leads[$i]->Lead->email;
            $status_id           = $leads[$i]->Lead->status_id;
            $ultimo_status_log   = $leads[$i]->Lead->ultimo_status_log;
            $celularFormatado    = $this->formataTelefone($celular);

            print_r('<br>');
            print_r($celularFormatado);

            $lead[$i] = array($id,$nome,$telefone,$celular,$celularFormatado,$email,$status_id,$ultimo_status_log);
            $sql = "INSERT INTO leads (lead_id,nome,telefone,celular,celular_formatado,email,status_id,ultimo_status_log) VALUES (?,?,?,?,?,?,?,?)";
            $this->db->query($sql, [$id,$nome,$telefone,$celular,$celularFormatado,$email,$status_id,$ultimo_status_log]);
            print_r('<br>Registro salvo no Banco');
        }

        return true;
    }


    
            // // PEGA CADA UM SALVA O HISTORICO DO LEAD
            // if ($this->update_historic_lidery($id)) {

            //     // DADOS QUE VÃO PARA O RD
            //     $dados = array("nome" => $nome,"email" => $email,"celular" => $celular);
            //     // PEGA CADA UM SALVA NO RD STATION
            //     if ($this->RDStation_model->enviarFormulario($dados,'ProjetoPai','')) {

            //     } else {
            //         print_r('Houve algum erro ao tentar salvar no RD STATION');
            //     }

            //     // ENVIA SMS
            //     if ($this->Locasms_model->enviarSMS('MENSAGEM TESTE DA API PP',$celularFormatado)) {

            //     # code...
            //     }

            // } else {

            //     print_r('Houve algum erro ao tentar salvar o historico do lead na API da Lidery');
            // }


            // PEGA CADA CONTATO E MANDA PARA O RD

             



   
       


    public function update_historic_lidery($id_user) {
        print_r('<br>');
        print_r('CAIU NO UPDATE LIDERY -> ID = ');
        print_r($id_user);
        print_r('<br>');



        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://hmg.api.lidery.org.br/leadHistoricos/salvarMarketing",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\r\n\t\"user_id\": 39,\r\n\t\"lead_id\": ".$id_user.",\r\n\t\"status_id_lead\": 27,\r\n\t\"titulo\": \"Update Projeto Pai\",\r\n\t\"mensagem\": \"Mensagem de teste PP\",\r\n\t\"tipo\": \"marketing\"\r\n}\r\n",
          CURLOPT_HTTPHEADER => array(
            "authorization: Basic bWFya2V0aW5nOnRlc3RlMTIz",
            "cache-control: no-cache",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error update_historic_lidery #:" . $err;
        } else {
          echo $response;
          return $response;
        }

    }


    function formataTelefone($numero){
        $valor = trim($numero);
        $valor = str_replace("(", "", $valor);
        $valor = str_replace(")", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace(" ", "", $valor);
        return $valor;
    }





    // public function getCurso($nivel = "", $area = "", $curso = "")
    // {
    //     return $this->db
    //         ->select("*")
    //         ->from("cursos_data")
    //         ->where("nivel", $nivel)
    //         ->where("area", $area)
    //         ->where("slug", $curso)
    //         ->where("ID_INST", $this->instituicao)
    //         ->order_by("titulo", "ASC")
    //         ->get()
    //         ->result_array();
        
    // }
}