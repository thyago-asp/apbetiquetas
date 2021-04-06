<?php
include "./tray/Tray.php";
session_start();

// FAço a  verificação se essa pagina foi acessada diretamente, caso tenha sido,
// redirtecionamos o usuario para a pagina inicial do site

?>
<!DOCTYPE html>
<html lang="pt">

<?php
include "./estrutura/head.php";
?>
<!-- Body-->

<body>



  <?php
  // Off-Canvas Category Menu
  include "./estrutura/menu.php";
  // Off-Canvas Mobile Menu
  include "./estrutura/menumobile.php";
  ?>


  <!-- Topbar-->
  <?php
  // Off-Canvas Category Menu
  include "./estrutura/topbar.php";
  // Navbar  
  include "./estrutura/header.php";

  $carrinhoVazio = false;
  ?>
  <!-- Off-Canvas Wrapper-->
  <div class="offcanvas-wrapper">
    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>Checkout</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="index.html">Inicio</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>Checkout</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
      <div class="row">
        <!-- Checkout Adress-->
        <div class="col-xl-9 col-lg-8">
          <div class="checkout-steps"><a href="checkout-review.html">4. Revisão do pedido</a><a href="checkout-payment.html"><span class="angle"></span>3. Pagamento</a><a href="checkout-shipping.php"><span class="angle"></span>2. Método de entrega</a><a class="active" href="checkout-address.html"><span class="angle"></span>1. Endereços</a></div>
          <h4>Endereço</h4>
          <hr class="padding-bottom-1x">
          <?php

          $tray = new Tray();
          $name = "";
          $email = "";
          $telephone = "";
          $city = "";
          $cpf = "";
          $zip = "";
          $address = "";
          $number = "";
          $complement = "";
          $bairro = "";
          $state = "";

          if (isset($_SESSION["id_customer"])) {
            $retorno = $tray->getClient($_SESSION["id_customer"]);

            $client = $retorno->{'Customer'};

            // print_r($client);
            $name = $client->{'name'};
            $email = $client->{'email'};
            $telephone = $client->{'cellphone'};
            $city = $client->{'city'};
            $cpf =  $client->{'cpf'};

            $zip = $client->{'zip_code'};
            $address = $client->{'address'};
            $number = $client->{'number'};
            $complement = $client->{'complement'};

            $bairro = $client->{'neighborhood'};
            $state = $client->{'state'};
          }
          ?>

          <form method="POST" action="./tray/Checkout.php">
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="checkout-fn">Nome completo</label>
                  <input class="form-control" type="text" id="checkout-fn" name="firstname" value="<?php echo $name ?>" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-fn">Cpf</label>
                  <input class="form-control" type="text" id="checkout-fn" name="cpf" value="<?php echo $cpf ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-email">E-mail</label>
                  <input class="form-control" type="email" id="checkout-email" name="email" value="<?php echo $email ?>" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-phone">Telefone</label>
                  <input class="form-control" type="text" id="checkout-phone" name="telephone" value="<?php echo $telephone ?>" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-zip">CEP</label>
                  <input class="form-control" type="text" id="checkout-zip" name="zip" value="<?php echo $zip ?>" required>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="checkout-address1">Endereço</label>
                  <input class="form-control" type="text" id="checkout-address1" name="address" value="<?php echo $address ?>" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="checkout-address2">Numero</label>
                  <input class="form-control" type="text" id="checkout-address2" name="number" value="<?php echo $number ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-address1">Complemento</label>
                  <input class="form-control" type="text" id="checkout-address1" name="complement" value="<?php echo $complement ?>" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-address1">Bairro</label>
                  <input class="form-control" type="text" id="checkout-address1" name="bairro" value="<?php echo $bairro ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-fn">Cidade</label>
                  <input class="form-control" type="text" id="checkout-fn" name="city" value="<?php echo $city ?>" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-fn">Estado</label>
                  <input class="form-control" type="text" id="checkout-fn" name="state" value="<?php echo $state ?>" required>
                </div>
              </div>

            </div>


            <div class="checkout-footer">
              <div class="column"><button class="btn btn-outline-secondary" href="cart.html"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Voltar às compras</span></a></div>
              <div class="column"><button class="btn btn-primary" type="submit"><span class="hidden-xs-down">Avançar&nbsp;</span><i class="icon-arrow-right"></i></button></div>
            </div>
          </form>
        </div>
        <!-- Sidebar          -->
        <div class="col-xl-3 col-lg-4">
          <aside class="sidebar">
            <div class="padding-top-2x hidden-lg-up"></div>
            <!-- Order Summary Widget-->
            <section class="widget widget-order-summary">
              <h3 class="widget-title">Resumo das compras</h3>
              <table class="table">
                <tr>
                  <td>Subtotal:</td>
                  <td class="text-medium">R$ <?php echo $_SESSION["valor_carrinho"] ?></td>
                </tr>
                <tr>
                  <td>Valor de entrega:</td>
                  <td class="text-medium">R$ - </td>
                </tr>

                <tr>
                  <td></td>
                  <td class="text-lg text-medium">R$ <?php echo $_SESSION["valor_carrinho"] ?></td>
                </tr>
              </table>
            </section>
            <!-- Featured Products Widget-->
            <!-- <section class="widget widget-featured-products">
              <h3 class="widget-title">Recently Viewed</h3>
             
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/01.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Oakley Kickback</a></h4><span class="entry-meta">$155.00</span>
                </div>
              </div>
          
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/02.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Top-Sider Fathom</a></h4><span class="entry-meta">$90.00</span>
                </div>
              </div>
             
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/03.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Vented Straw Fedora</a></h4><span class="entry-meta">$49.50</span>
                </div>
              </div>
              
              <div class="entry">
                <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/04.jpg" alt="Product"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="shop-single.html">Big Wordmark Tote</a></h4><span class="entry-meta">$29.99</span>
                </div>
              </div>
            </section>
           
            <section class="promo-box" style="background-image: url(img/banners/02.jpg);"><span class="overlay-dark" style="opacity: .4;"></span>
              <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                <h3 class="text-bold text-light text-shadow">Sunglasses</h3><a class="btn btn-outline-white btn-sm" href="shop-grid-ls.html">Shop Now</a>
              </div>
            </section> -->
          </aside>
        </div>
      </div>
    </div>
    <!-- Site Footer-->
    <?php
include "./estrutura/footer.php";
?>
  </div>
  <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
  <!-- Backdrop-->
  <div class="site-backdrop"></div>
  <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
  <script src="js/vendor.min.js"></script>
  <script src="js/scripts.min.js"></script>
</body>

</html>