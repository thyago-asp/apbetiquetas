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

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/carts/" . $sessao . "/" . $item . "?" . http_build_query($params);

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

    function createUser(Usuario $user)
    {
        $auth = new auth();

        $params["access_token"] = $auth->getToken();

        $data["Customer"]["name"] = $user->getNome();
        $data["Customer"]["cpf"] =  $user->getCpf();
        $data["Customer"]["phone"] =  $user->getTelefone();
        $data["Customer"]["cellphone"] =  $user->getTelefone();
        $data["Customer"]["birth_date"] =  $user->getNascimento();
        //  $data["Customer"]["gender"] = "0";
        $data["Customer"]["email"] = $user->getEmail();
        $data["Customer"]["nickname"] =  $user->getApelido();
        // $data["Customer"]["observation"] = "";
        // $data["Customer"]["type"] = "1";

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/customers/?" . http_build_query($params);
        ob_start();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            )
        );

        curl_exec($ch);

        // JSON de retorno  
        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_exec($ch);
        ob_end_clean();
        curl_close($ch);
        // print_r($resposta);
        if ($code == "201") {
            return $resposta;
        } else {
            return $resposta;
        }
    }


    function getClient($id)
    {
        $auth = new auth();

        //echo $parametros
        $params["access_token"] =  $auth->getToken();

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/customers/" . $id . "?" . http_build_query($params);

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
            return null;
        }
    }

    function getShippings()
    {
        $auth = new auth();

        //echo $parametros
        $params["access_token"] =  $auth->getToken();

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/shippings/?" . http_build_query($params);

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
            return null;
        }
    }

    function cotation($product, $zipcode)
    {
        $auth = new auth();

        //echo $parametros
        $params["access_token"] =  $auth->getToken();
        $params["zipcode"] =  $zipcode;
        $cont = 0;
        foreach ($product as $key => $value) {

            //  print_r($value);
            $params["products[" . $cont . "][product_id]"] = $value->{"id"};
            $params["products[" . $cont . "][price]"] = $value->{"price"};
            $params["products[" . $cont . "][quantity]"] = $value->{"quantity"};

            $cont++;
        }

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/shippings/cotation?" . http_build_query($params);

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

        //print_r($resposta);
        if ($code == "200") {
            return $resposta;
        } else  if ($code == "404") {
            return null;
        }
    }

    function createOrder(Usuario $user, $products)
    {
        $auth = new auth();

        $params["access_token"] = $auth->getToken();
        $data["Order"]["point_sale"] = "PARTICULAR";
        $data["Order"]["shipment"] = "Frete Facil";
        $data["Order"]["shipment_value"] = "";
        $data["Order"]["payment_form"] = "";
        $data["Order"]["Customer"]["type"] = "0";
        $data["Order"]["Customer"]["name"] = $user->getNome();
        $data["Order"]["Customer"]["cpf"] = $user->getCpf();
        $data["Order"]["Customer"]["email"] = $user->getEmail();

        $data["Order"]["Customer"]["phone"] = $user->getTelefone();
        $data["Order"]["Customer"]["CustomerAddress"][0]["address"] = $user->getAddress();
        $data["Order"]["Customer"]["CustomerAddress"][0]["zip_code"] = $user->getZipcode();
        $data["Order"]["Customer"]["CustomerAddress"][0]["number"] = $user->getNumber();
        $data["Order"]["Customer"]["CustomerAddress"][0]["complement"] = $user->getComplement();
        $data["Order"]["Customer"]["CustomerAddress"][0]["neighborhood"] = $user->getNeighborhood();
        $data["Order"]["Customer"]["CustomerAddress"][0]["city"] = $user->getCity();
        $data["Order"]["Customer"]["CustomerAddress"][0]["state"] = $user->getState();
        $data["Order"]["Customer"]["CustomerAddress"][0]["country"] = "BRA";
        $data["Order"]["Customer"]["CustomerAddress"][0]["type"] = "0";
        $cont = 0;

        foreach ($products as $key => $value) {
            print_r($value->{'id'});
            $data["Order"]["ProductsSold"][$cont]["product_id"] = $value->{'id'};
            $data["Order"]["ProductsSold"][$cont]["price"] = $value->{'price'};
            $data["Order"]["ProductsSold"][$cont]["original_price"] = $value->{'price'};
            $data["Order"]["ProductsSold"][$cont]["quantity"] = $value->{'quantity'};

            $cont++;
        }

       // print_r(json_encode($data));
        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/orders?" . http_build_query($params);
        ob_start();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            )
        );

        curl_exec($ch);

        // JSON de retorno  
        $resposta = json_decode(ob_get_contents());
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_exec($ch);
        ob_end_clean();
        curl_close($ch);

       // print_r($resposta);
        if ($code == "201") {
           return $resposta;
        } else  if ($code == "400") {
            //  p rint_r($resposta->causes->{"Cart"}->{"product_id"}[0]);
        }
    }
}
