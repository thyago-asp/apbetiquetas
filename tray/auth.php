<?php

class auth
{
    private $token;

    public function __construct(){
        $objeto = $this->gerarChaveDeAcesso();
        $chave = $objeto->access_token;
        $this->setToken($chave);
    }


    function gerarChaveDeAcesso()
    {
        $params["consumer_key"] = "049fb4285ee66ba3ea1c3e2a711f1ad47902b2986ecc39875fd8f4a618a87ab9";
        $params["consumer_secret"] = "32e1a31cbe426230dcd079fd798aaeee6b477b40b7050a7513bda9882771c022";
        $params["code"] = "556a92247e6e87504c8e64e363d42ba56ca1c1cce4025575291e4b420bdce636";

        $url = "https://apbetiquetaserotulos.commercesuite.com.br/web_api/auth";

        ob_start();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
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
            print_r("caiu aqui no 401 do auth");
        }
    }



    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
}
