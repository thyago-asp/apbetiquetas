<?php
include "auth.php";
class Tray
{
    private

    function validar()
    {
    }

    function buscarComFiltro($funcao, $parametros)
    {
        $auth = new auth();
        $parametros;

        for ($i = 0; $i < count($parametros); $i++) {
            //print_r($chave);

            $parametros += $parametros[$i];
        }
        //echo $parametros
        $params["access_token"] =  $auth->getToken();
        $params["category_id"] = "21";

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/" . $funcao . "/?" . http_build_query($params);

        ob_start();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_exec($ch);

        // JSON de retorno  
        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        if ($code == "200") {
            return $resposta;
        } else  if ($code == "401") {
        }
    }

    function buscarDetalhesDoProduto($id)
    {
        $auth = new auth();
        $params["access_token"] = $auth->getToken();
        //  $params["id"] = $id;

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/products/" . $id . "?" . http_build_query($params);

        ob_start();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_exec($ch);

        // JSON de retorno  
        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        if ($code == "200") {

            return $resposta;
            //Tratamento dos dados de resposta da consulta.

        } else {
            return $url;
            //Tratamento das mensagens de erro

        }
    }

    function buscarProdutosDaCategoria($idCategoria)
    {
        $auth = new auth();
        $params["access_token"] = $auth->getToken();
         $params["category_id"] = $idCategoria;

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/products/?" . http_build_query($params);

        ob_start();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_exec($ch);

        // JSON de retorno  
        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        if ($code == "200") {

            return $resposta;
            //Tratamento dos dados de resposta da consulta.

        } else {
            return $url;
            //Tratamento das mensagens de erro

        }
    }

    function buscar($funcao)
    {
        $auth = new auth();

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/" . $funcao . "/?access_token=" . $auth->getToken();

        ob_start();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_exec($ch);

        // JSON de retorno  
        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        if ($code == "200") {
            return $resposta;
        } else  if ($code == "401") {
        }
    }
}


/*$exec = new Tray();

$lista = $exec->buscar("categories/tree");
//print_r($lista);
for ($i = 0; $i < count($lista->Category); $i++) {
   // print_r($lista->Category[$i]->Category->name);
    for ($j = 0; $j < count($lista->Category[$i]->Category->children); $j++) {
   //     echo "<br>";
   //     echo " - "; 
   //     print_r($lista->Category[$i]->Category->children[$j]->Category->name);
        
        for ($k = 0; $k < count($lista->Category[$i]->Category->children[$j]->Category->children); $k++) {
    //        echo "<br>";
     //       echo " - - "; 
     //       print_r($lista->Category[$i]->Category->children[$j]->Category->children[$k]->Category->name);
     //       echo "<br>";
        }
     //   echo "<br>";
    }

 //   echo "<br>";
}*/
