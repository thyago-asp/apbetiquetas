<?php 
$acao = $_GET["acao"];

switch ($acao) {
    case 'cadastrar':
        cadastrarUsuario();
        break;
    
    default:
        # code...
        break;
}


function cadastrarUsuario(){
    $nome = $_POST["nomecompleto"];
    $apelido = $_POST["apelido"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];

    
}
