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
          <h1>Sobre nós</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="index.html">Home</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>About Us</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-2x mb-2">
      <div class="row align-items-center padding-bottom-2x">
        <div class="col-md-5"><img class="d-block w-270 m-auto" src="img/front.jpg" alt="Online Shopping"></div>
        <div class="col-md-7 text-md-left text-center">
          <div class="mt-30 hidden-md-up"></div>
          <h2>Sede da empresa.</h2>
          <p>Localizada nas proximidades do Terminal do Carmo. A loja possui um amplo estacionamento para os clientes. Venha nos fazer uma visita, nosso endereço é Rua das Carmelita, 2673, no bairro do Boqueirão – Curitiba/PR.</p>
        </div>
      </div>
      <hr>
      <div class="row align-items-center padding-top-2x padding-bottom-2x">
        <div class="col-md-5 order-md-2"><img class="d-block w-270 m-auto" src="img/serv.jpg" alt="Delivery"></div>
        <div class="col-md-7 order-md-1 text-md-left text-center">
          <div class="mt-30 hidden-md-up"></div>
          <h2>Show room de produtos</h2>
          <p>Venha conferir nossos Produtos em nossa Loja Física. Temos diversos modelos de Etiquetas, além de Pinos, Aplicadores, Etiquetadores e Impressoras à Pronta Entrega.</p>
        </div>
      </div>
      <hr>
      <div class="row align-items-center padding-top-2x padding-bottom-2x">
        <div class="col-md-5"><img class="d-block w-270 m-auto" src="img/papel.jpg" alt="Mobile App"></div>
        <div class="col-md-7 text-md-left text-center">
          <div class="mt-30 hidden-md-up"></div>
          <h2>Nossa área fabril</h2>
          <p class="mb-4">Dispõem de mais de 350 m² de área fabril para a fabricação dos produtos que sua empresa necessita, sempre com excelente qualidade.</p>
        </div>
      </div>
     
      <hr>
      <div class="text-center padding-top-3x mb-30">
        <h2>Nossa empresa</h2>
        <p class="text-muted">Conheça um pouco mais da nossa expêriencia.</p>
      </div>
      <div class="row text-center">
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true }">
          <figure><img src="img/front.jpg" width="40%" alt="Image">
            
          </figure>
          <figure><img src="img/serv.jpg" width="40%" alt="Image">
            
          </figure>
          <figure><img src="img/cores.jpg" width="40%" alt="Image">
            
          </figure>
          <figure><img src="img/etiqueta.jpg" width="40%" alt="Image">
            
          </figure>
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