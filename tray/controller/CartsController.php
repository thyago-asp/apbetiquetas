<?php
include "../model/Produto.php";
include "../Tray.php";
session_start();

if (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest") {
    $acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
    
    switch ($acao) {
        case 'add':
            $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_SANITIZE_STRING);
            $quant = filter_input(INPUT_POST, 'quant', FILTER_SANITIZE_STRING);
            $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
        
            $obj = new CartsController();
            $pro = new Produto();

            $pro->setId($idProduto);
            $pro->setQuantity($quant);
            $pro->setPrice($preco);

            $obj->addCarts($pro);

            break;

        case 'refresh':
                $obj = new CartsController();
                
                $obj->refreshCarts();
            break;

            case 'excluir':
                $obj = new CartsController();
                $idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_SANITIZE_STRING);
                $obj->excluirItem($idProduto);
            break;

        default:
            # code...
            break;
    }
}


class CartsController
{


    function addCarts(Produto $pro)
    {

        $tray = new Tray();
        $pro->setSession(session_id());

        $retorno = $tray->createNewCarts($pro);

        echo $retorno;
        return;
    }

    function refreshCarts()
    {
        $tray = new Tray();

        $dados = $tray->buscarCarrinhoCompleto(session_id());
        $carrinho = $dados->Cart;

        echo json_encode($carrinho);
        return;
    }

    function excluirItem($item){
        $tray = new Tray();

        $retorno = $tray->excluirItemCarrinho(session_id(), $item);
       

        echo json_encode($retorno);
        return;
    }
}
