<div class="offcanvas-container" id="mobile-menu">
  <!--<a class="account-link" href="account-orders.html">
      <div class="user-ava"><img src="img/account/user-ava-md.jpg" alt="Daniel Adams">
      </div>
      <div class="user-info">
        <h6 class="user-name">Daniel Adams</h6><span class="text-sm text-white opacity-60">290 Reward points</span>
      </div>
    </a>-->
  <nav class="offcanvas-menu">
    <ul class="menu">
      <?php
      if (isset($_SESSION["lista"])) {

        $lista = $_SESSION["lista"];
      } else {
        $exec = new Tray();

        $lista = $exec->buscar("categories/tree");

        $_SESSION["lista"] = $lista;
      }
      //print_r($lista);
      for ($i = 0; $i < count($lista->Category); $i++) {
       // print_r($lista->Category[$i]->Category->name);

        for ($j = 0; $j < count($lista->Category[$i]->Category->children); $j++) {

      ?>
          <li class="has-children"><span><a href="#"><?php echo $lista->Category[$i]->Category->children[$j]->Category->name ?></a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              <?php
              for ($k = 0; $k < count($lista->Category[$i]->Category->children[$j]->Category->children); $k++) {
              ?>

                <li><a href="/shop-grid-ls.php?c=re"><?php echo $lista->Category[$i]->Category->children[$j]->Category->children[$k]->Category->name ?> </a></li>

              <?php


              }
              ?>
            </ul>

          </li>

      <?php
        }
      }
      ?>
    </ul>
  </nav>
</div>