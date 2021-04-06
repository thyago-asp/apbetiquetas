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
  <div class="offcanvas-wrapper">f
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
          <div class="checkout-steps"><a href="checkout-review.php">4. Revisão do pedido</a><a class="active" href="checkout-payment.php"><span class="angle"></span>3. Pagamento</a><a class="completed" href="checkout-shipping.php"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>2. Método de entrega</a><a class="completed" href="checkout-address.php"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>1. Endereços</a></div>
          <h4>Escolha o meio de pegamento</h4>
          <hr class="padding-bottom-1x">
          <div class="accordion" id="accordion" role="tablist">
            <div class="card">
              <div class="card-header" role="tab">
                <h6><a href="#card" data-toggle="collapse"><i class="icon-columns"></i>Pague com cartão de crédito</a></h6>
              </div>
              <div class="collapse show" id="card" data-parent="#accordion" role="tabpanel">
                <div class="card-body">
                  <p>Nós aceitamos os seguintes cartões de crédito:&nbsp;<img class="d-inline-block align-middle" src="img/credit-cards.png" style="width: 120px;" alt="Cerdit Cards"></p>
                  <div class="card-wrapper"></div>
                  <form class="interactive-credit-card row">
                    <div class="form-group col-sm-6">
                      <input class="form-control" type="text" name="number" placeholder="Número do cartão" required>
                    </div>
                    <div class="form-group col-sm-6">
                      <input class="form-control" type="text" name="name" placeholder="Nome que está no cartão" required>
                    </div>
                    <div class="form-group col-sm-3">
                      <input class="form-control" type="text" name="expiry" placeholder="MM/AA" required>
                    </div>
                    <div class="form-group col-sm-3">
                      <input class="form-control" type="text" name="cvc" placeholder="CVC" required>
                    </div>
                    <div class="col-sm-6">
                      <button class="btn btn-outline-primary btn-block margin-top-none" type="submit">Finalizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab">
                <h6><a class="collapsed" href="#paypal" data-toggle="collapse"><i class="socicon-paypal"></i>Pay with PayPal</a></h6>
              </div>
              <div class="collapse" id="paypal" data-parent="#accordion" role="tabpanel">
                <div class="card-body">
                  <p>PayPal - the safer, easier way to pay</p>
                  <form class="row" method="post">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" type="email" placeholder="E-mail" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" type="password" placeholder="Password" required>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-flex flex-wrap justify-content-between align-items-center"><a class="navi-link" href="#">Forgot password?</a>
                        <button class="btn btn-outline-primary margin-top-none" type="submit">Log In</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab">
                <h6><a class="collapsed" href="#points" data-toggle="collapse"><i class="icon-medal"></i>Redeem Reward Points</a></h6>
              </div>
              <div class="collapse" id="points" data-parent="#accordion" role="tabpanel">
                <div class="card-body">
                  <p>You currently have<span class="text-medium"> 290</span> Reward Points to spend.</p>
                  <div class="custom-control custom-checkbox d-block">
                    <input class="custom-control-input" type="checkbox" id="use_points">
                    <label class="custom-control-label" for="use_points">Use my Reward Points to pay for this order.</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="checkout-footer margin-top-1x">
            <div class="column"><a class="btn btn-outline-secondary" href="checkout-shipping.php"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back</span></a></div>
            <div class="column"><a class="btn btn-primary" href="checkout-review.php"><span class="hidden-xs-down">Continue&nbsp;</span><i class="icon-arrow-right"></i></a></div>
          </div>
        </div>
        <!-- Sidebar          -->
        <div class="col-xl-3 col-lg-4">
          <aside class="sidebar">
            <div class="padding-top-2x hidden-lg-up"></div>
            <!-- Order Summary Widget-->
            <section class="widget widget-order-summary">
              <h3 class="widget-title">Order Summary</h3>
              <table class="table">
                <tr>
                  <td>Subtotal:</td>
                  <td class="text-medium">R$ <?php echo $_SESSION["valor_carrinho"] ?></td>
                </tr>
                <tr>
                  <td>Valor de entrega:</td>
                  <td class="text-medium">R$ <?php echo number_format($_SESSION["cotation"], 2, ",", "."); ?> </td>
                </tr>

                <tr>
                  <td></td>
                  <td class="text-lg text-medium">R$ <?php echo number_format(intval($_SESSION["valor_carrinho"]) + $_SESSION["cotation"], 2, ",", ".") ?></td>
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
  <script src="js/card.min.js"></script>
  <script src="js/scripts.min.js"></script>
</body>

</html>