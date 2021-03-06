<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="navbar navbar-sticky">
  <!-- Search-->
  <form class="site-search" method="get">
    <input type="text" name="site_search" placeholder="Type to search...">
    <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
  </form>
  <div class="site-branding">
    <div class="inner">
      <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
      <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
      <!-- Site Logo--><a class="site-logo text-center" href="/"><img src="http://apbetiquetas.com.br/wp-content/uploads/2017/08/logo.jpg" alt="Unishop"></a>
    </div>
  </div>
  <!-- Main Navigation-->
  <?php
  include './estrutura/menunavigation.php';
  ?>
  <!-- Toolbar-->
  <div class="toolbar">
    <div class="inner">
      <div class="tools">

        <div class="account"><a href="account-orders.html"></a><i class="icon-head"></i>
          <ul class="toolbar-dropdown">
            <li class="sub-menu-user">
              <div class="user-ava"><img src="img/account/user-ava-sm.jpg" alt="Daniel Adams">
              </div>
              <div class="user-info">
                <h6 class="user-name">Daniel Adams</h6><span class="text-xs text-muted">290 Reward points</span>
              </div>
            </li>
            <li><a href="account-profile.html">My Profile</a></li>
            <li><a href="account-orders.html">Orders List</a></li>
            <li><a href="account-wishlist.html">Wishlist</a></li>
            <li class="sub-menu-separator"></li>
            <li><a href="#"> <i class="icon-unlock"></i>Logout</a></li>
          </ul>
        </div>
        <?php
        $tray = new Tray();

        $dados = $tray->buscarComFiltro("carts", session_id());
        $quantCarrinho = 0;
        $valorCarrinho = 0.00;
        
        if ($dados !== null) {
          $carrinho = $dados->Cart;

          $quantCarrinho = 0;
          foreach ($carrinho->Products as $key => $value) {
            $quantCarrinho = $quantCarrinho + $value->quantity;
          }
          $valorCarrinho = $carrinho->total;
        }

        ?>
        <div class="cart"><a href="cart.html"></a><i class="icon-bag"></i><span class="count" id="quantCarrinho"><?php echo $quantCarrinho ?></span><span class="subtotal" id="total_carrinho">R$ <?php echo $valorCarrinho?> </span>

        </div>
      </div>
    </div>
  </div>
</header>