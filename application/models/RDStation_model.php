<?php

class RDStation_model extends CI_Model
{
    public function enviarFormulario($dados, $identificador, $retorno)
    {
        print_r('<br>');
        print_r($dados);
        print_r($identificador);
        $rdAPI = new RDStation("0972d526825ce31097983fee8579b3a4", "9ffad48108cf5d5c7b3d0216f700c387");
        $dados += ["identificador" =>  $identificador];
        $return1 = $rdAPI->sendNewLead($dados['email'], $dados);
        // print_r($return1);
        $msg = "<div class='alert alert-success'>Gravado no RD Station com Sucesso!</div>";
        $this->session->set_flashdata("success", $msg);
        echo $msg;
        return true;

        // redirect($retorno);
    }
}