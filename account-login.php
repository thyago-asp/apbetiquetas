<?php
include "./tray/Tray.php";
session_start();
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

  ?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Login / Register Account</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.html">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="account-orders.html">Account</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Login / Register</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <div class="col-md-6">
            <form class="login-box" method="post">
              <div class="row margin-bottom-1x">
                <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block facebook-btn" href="#"><i class="socicon-facebook"></i>&nbsp;Facebook login</a></div>
                <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block twitter-btn" href="#"><i class="socicon-twitter"></i>&nbsp;Twitter login</a></div>
                <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block google-btn" href="#"><i class="socicon-googleplus"></i>&nbsp;Google+ login</a></div>
              </div>
              <h4 class="margin-bottom-1x">Or using form below</h4>
              <div class="form-group input-group">
                <input class="form-control" type="email" placeholder="Email" required><span class="input-group-addon"><i class="icon-mail"></i></span>
              </div>
              <div class="form-group input-group">
                <input class="form-control" type="password" placeholder="Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="remember_me" checked>
                  <label class="custom-control-label" for="remember_me">Remember me</label>
                </div><a class="navi-link" href="account-password-recovery.html">Forgot password?</a>
              </div>
              <div class="text-center text-sm-right">
                <button class="btn btn-primary margin-bottom-none" type="submit">Login</button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="padding-top-3x hidden-md-up"></div>
            <h3 class="margin-bottom-1x">Realize o seu cadastro</h3>
            <p>O registro leva menos de um minuto, mas oferece controle total sobre seus pedidos.</p>
            <form class="row" method="post" action="">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-fn">Nome completo</label>
                  <input class="form-control" type="text" id="reg-fn" name="nomecompleto" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ln">Apelido</label>
                  <input class="form-control" type="text" id="reg-ln" name="apelido" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email">E-mail</label>
                  <input class="form-control" type="email" id="reg-email" name="email" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Telefone</label>
                  <input class="form-control" type="text" id="reg-phone" name="telefone" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass">Senha</label>
                  <input class="form-control" type="password" id="reg-pass" name="senha" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-pass-confirm">Confirme a senha</label>
                  <input class="form-control" type="password" id="reg-pass-confirm" required>
                </div>
              </div>
              <div class="col-12 text-center text-sm-right">
                <button class="btn btn-primary margin-bottom-none" type="submit">Cadastrar</button>
              </div>
            </form>
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