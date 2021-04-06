<?php
session_start();
include "./Tray.php";
include "./model/Usuario.php";

$name = $_POST["firstname"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$city = $_POST["city"];
$zip = $_POST["zip"];
$address = $_POST["address"];
$number = $_POST["number"];
$complement = $_POST["complement"];
$bairro = $_POST["bairro"];
$state = $_POST["state"];

$user = new Usuario();

$user->setNome($name);
$user->setCpf($cpf);
$user->setEmail($email);
$user->setTelefone($telephone);
$user->setCity($city);
$user->setZipcode($zip);
$user->setAddress($address);
$user->setNumber($number);
$user->setComplement($complement);
$user->setNeighborhood($bairro);
$user->setState($state);
$user->setType("0");

$tray = new Tray();

$carrinho = $tray->buscarCarrinhoCompleto(session_id());

$retorno = $tray->createOrder($user, $carrinho->Cart->Products);

print_r($retorno);

$_SESSION["zipcode"] = $zip;
$_SESSION["order_id"] = $retorno->{"order_id"};

header("location: ../checkout-shipping.php");