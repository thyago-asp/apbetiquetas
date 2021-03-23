<?php
include "auth.php";
class Tray
{


    function buscarCarrinhoCompleto($sessao)
    {
        $auth = new auth();

        //echo $parametros
        $params["access_token"] =  $auth->getToken();
        $params["category_id"] = "21";

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/carts/" . $sessao . "/complete?" . http_build_query($params);

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
        } else  if ($code == "404") {
            $t = new Tray();

            $t->criarCarrinhoVazio();
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

    function criarCarrinhoVazio()
    {
        $auth = new auth();

        $params["access_token"] = $auth->getToken();
        $params["Cart"]["session_id"] = session_id();


        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/carts/?" . http_build_query($params);
        ob_start();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($params))
            )
        );

        curl_exec($ch);

        // JSON de retorno  
        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        if ($code == "200") {
            return $resposta->{"message"};
        } else  if ($code == "400") {
            //  print_r($resposta->causes->{"Cart"}->{"product_id"}[0]);
        }
    }

    function createNewCarts(Produto $product)
    {

        $auth = new auth();

        $params["access_token"] = $auth->getToken();
        $params["Cart"]["session_id"] = $product->getSession();
        $params["Cart"]["product_id"] = $product->getId();
        $params["Cart"]["variant_id"] = "";
        $params["Cart"]["quantity"] = "1";
        $params["Cart"]["price"] = $product->getPrice();
        $params["Cart"]["additional_information"] = $product->getAdditionalInformation();

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/carts/?" . http_build_query($params);
        ob_start();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($params))
            )
        );

        curl_exec($ch);

        // JSON de retorno  
        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

        if ($code == "200") {
            return $resposta->{"message"};
        } else  if ($code == "400") {
            return print_r($resposta->causes->{"Cart"}->{"product_id"}[0]);
        }
    }

    function excluirItemCarrinho($sessao, $item)
    {
        $auth = new auth();

        $params["access_token"] =  $auth->getToken();

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/carts/".$sessao."/".$item."?" . http_build_query($params);

        ob_start();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($params))
            )
        );

        curl_exec($ch);


        // JSON de retorno  

        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        ob_end_clean();
        curl_close($ch);
        print_r($resposta);
        if ($code == "200") {

            //Tratamento dos dados de resposta da consulta.
            return "excluiu";
        } else {
            return $resposta;
            //Tratamento das mensagens de erro

        }
    }
}
