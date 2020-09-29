<?php
include "./tray/Tray.php";
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
  include __DIR__ . "/estrutura/menu.php";
  // Off-Canvas Mobile Menu
  include __DIR__ . "/estrutura/menumobile.php";
  ?>
  <!-- Topbar-->
  <?php
  // Off-Canvas Category Menu
  include "./estrutura/topbar.php";

  include "./estrutura/header.php";

  ?>

  <!-- Off-Canvas Wrapper-->
  <div class="offcanvas-wrapper">
    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>Contatos</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="index.html">Home</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>Contacts</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-2x mb-2">
      <div class="row">
        <div class="col-md-7">
          <div class="display-3 text-muted opacity-75 mb-30">Horário de atendimento</div>
        </div>
        <div class="col-md-5">
          <ul class="list-icon">
            <li> <i class="icon-map"></i>Rua das Carmelitas, 2673
              Boqueirão – Curitiba – PR</li>

            <li> <i class="icon-clock"></i>Segunda-Feira à Sexta-Feira</li>
            <li> <i class="icon-play"></i>09:00 às 18:00</li>
          </ul>
        </div>
      </div>
      <hr class="margin-top-2x">
      <div class="row margin-top-2x">
        <div class="col-md-7">
          <div class="display-3 text-muted opacity-75 mb-30">Detalhes do contato</div>
        </div>
        <div class="col-md-5">
          <ul class="list-icon">
            <li> <i class="icon-mail"></i><a class="navi-link" href="mailto:apb@apbetiquetas.com.br">apb@apbetiquetas.com.br</a></li>
            <li> <i class="icon-anchor"></i>@apbetiquetas</li>
            <li> <i class="icon-help"></i>(41) 3342-6536</li>
            <li> <i class="icon-help"></i>(41) 99509-3017</li>
          </ul>
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