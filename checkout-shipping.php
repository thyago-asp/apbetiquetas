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
            <li><a href="index.php">Home</a>
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
          <div class="checkout-steps"><a href="checkout-review.php">4. Revisão do pedido</a><a href="checkout-payment.php"><span class="angle"></span>3. Pagamento</a><a class="active" href="checkout-shipping.php"><span class="angle"></span>2. Método de entrega</a><a class="completed" href="checkout-address.php"><span class="angle"></span><span class="step-indicator icon-circle-check"></span>1. Endereços</a></div>

          <h4>Escolha seu método de entrega</h4>
          <hr class="padding-bottom-1x">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="thead-default">
                <tr>
                  <th></th>
                  <th>Método de envio</th>
                  <th>Data prevista de entrega</th>
                  <th>Custo de envio</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $tray = new Tray();

                $typeShippings = $tray->getShippings();
                $carrinho = $tray->buscarCarrinhoCompleto(session_id());
                $cotation = "";
                if ($carrinho !== null) {
                  $cotation = $tray->cotation($carrinho->Cart->Products, $_SESSION["zipcode"]);
                  $_SESSION["cotation"] = $cotation->{"Shipping"}->{"cotation"}[0]->{"value"};
                  
                  
                }
                
                foreach ($typeShippings->{"Shippings"} as $key => $value) {
                  

                  if ($value->{"Shipping"}->{"status"} == "1") {
                    

                ?>

                    <tr>
                      <td class="align-middle">
                        <div class="custom-control custom-radio mb-0">
                          <input class="custom-control-input" type="radio" id="courier" name="shipping-method" checked>
                          <label class="custom-control-label" for="courier"></label>
                        </div>
                      </td>
                      <td class="align-middle"><span class="text-medium"><?php echo $value->{"Shipping"}->{"display_name"} ?></span><br><span class="text-muted text-sm">All Addresses(default zone), United States & Canada</span></td>
                      <td class="align-middle"><?php echo $cotation->{"Shipping"}->{"cotation"}[0]->{"estimated_delivery_date"} ?></td>
                      <td class="align-middle">R$ <?php echo number_format($_SESSION["cotation"],2,",",".");?></td>
                    </tr>

                <?php
                  }
                }
                ?>
                
              </tbody>
            </table>
          </div>
          <div class="checkout-footer margin-top-1x">
            <div class="column"><a class="btn btn-outline-secondary" href="checkout-address.php"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back</span></a></div>
            <div class="column"><a class="btn btn-primary" href="checkout-payment.php"><span class="hidden-xs-down">Continue&nbsp;</span><i class="icon-arrow-right"></i></a></div>
          </div>
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
                  <td class="text-medium">R$ <?php echo number_format($_SESSION["cotation"],2,",",".");?> </td>
                </tr>

                <tr>
                  <td></td>
                  <td class="text-lg text-medium">R$ <?php echo number_format(intval($_SESSION["valor_carrinho"]) + $_SESSION["cotation"],2,",",".")?></td>
                </tr>
              </table>
            </section>
            <!-- Featured Products Widget-->

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