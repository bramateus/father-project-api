<?php
function mostraParcelas($valor, $parcelasBoleto, $parcelasCartao, $promocao, $desconto = array())
{
    $b = explode(",", $parcelasBoleto);
    $c = explode(",", $parcelasCartao);

    $pb = end($b);
    $pcb = (int)$pb;
    $pc = end($c);
    $pcc = (int)$pc;

    if ($pcb > $pcc) {
        if ($promocao == 0) {
            $newprice = (($valor * (100 - $desconto[0])) / 100) / $pcb;
            $vl[0]    = $newprice;
            $vl[1]    = $pcb;

            return $vl;
        } else {
            $newprice = (($valor * (100 - $desconto[1])) / 100) / $pcb;
            $vl[0]    = $newprice;
            $vl[1]    = $pcb;

            return $vl;
        }
    } else {
        if ($promocao == 0) {
            $newprice = (($valor * (100 - $desconto[0])) / 100) / $pcc;
            $vl[0]    = $newprice;
            $vl[1]    = $pcc;

            return $vl;
        } else {
            $newprice = (($valor * (100 - $desconto[2])) / 100) / $pcc;
            $vl[0]    = $newprice;
            $vl[1]    = $pcc;

            return $vl;
        }
    }


}