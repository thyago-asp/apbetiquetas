<?php
include "../model/Usuario.php";
include "../Tray.php";

$acao = $_GET["acao"];

switch ($acao) {
    case 'cadastrar':
        cadastrarUsuario();
        break;

    default:
        # code...
        break;
}


function cadastrarUsuario()
{
    $nome = $_POST["nomecompleto"];
    $apelido = $_POST["apelido"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $nascimento = $_POST["nascimento"];

    $user = new Usuario();
    $tray = new Tray();

    $user->setNome($nome);
    $user->setApelido($apelido);
    $user->setEmail($email);
    $user->setTelefone($telefone);
    $user->setSenha($senha);
    $user->setCpf($cpf);
    $user->setNascimento($nascimento);

    $return = $tray->createUser($user);

    print_r($return);

    if ($return->{'code'} == "201") {
        session_start();
        $_SESSION["id_customer"] = $return->{'id'};
        header("location: /");
    } else {
        $erro = "";
        foreach ($return->{'causes'}->{'Customer'} as $categoria => $valuee) {
            foreach ($valuee as $key => $value) {
                // printf($categoria . " - " . $value);

                if ($value == "This value has already been taken.") {
                    $erro .= "001-";
                }
                if ($value == "This CPF has already been taken.") {
                    $erro .= "002-";
                }
                if ($value == "This CPF is invalid.") {
                    $erro .= "003-";
                }
            }
        }
     //  header("location: /account-login.php?erro=".substr($erro,0,-1)."");

    }

    function
}
