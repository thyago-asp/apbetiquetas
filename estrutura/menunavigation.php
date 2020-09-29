<nav class="site-menu">
  <ul>
    <?php
    $categoria = "";
    $inicio = "";
    $etiquetas = "";
    if (isset($_REQUEST["c"])) {
      $categoria = $_REQUEST["c"];
    }

    switch ($categoria) {
      case "in":
        $inicio = "active";
        break;
      case "re":
        $etiquetas = "active";
        break;
      case "sn":
        $sobre = "active";
        break;
      case "fq":
        $faq = "active";
        break;
      case "ct":
        $contato = "active";
        break;
    }
    ?>


    <li class="has-megamenu <?php echo $inicio ?>"><a href="/?c=in"><span>Inicio</span></a></li>
    <li class="has-megamenu <?php echo $etiquetas ?>"><a href="/shop-grid-ls.php?c=re"><span>Etiquetas e rótulos</span></a></li>
    <li class="has-megamenu <?php echo $sobre ?>"><a href="/about.php?c=sn"><span>Sobre nós</span></a></li>
    <li class="has-megamenu <?php echo $faq ?>"><a href="/faq.php?c=fq"><span>Perguntas frequentes</span></a></li>
    <li class="has-megamenu <?php echo $contato ?>"><a href="/contacts.php?c=ct"><span>Contato</span></a></li>
    <!--<li><a href="shop-grid-ls.html"><span>Shop</span></a>
      <ul class="sub-menu">
        <li><a href="shop-categories.html">Shop Categories</a></li>
        <li class="has-children"><a href="shop-grid-ls.html"><span>Shop Grid</span></a>
          <ul class="sub-menu">
            <li><a href="shop-grid-ls.html">Grid Left Sidebar</a></li>
            <li><a href="shop-grid-rs.html">Grid Right Sidebar</a></li>
            <li><a href="shop-grid-ns.html">Grid No Sidebar</a></li>
          </ul>
        </li>
        <li class="has-children"><a href="shop-list-ls.html"><span>Shop List</span></a>
          <ul class="sub-menu">
            <li><a href="shop-list-ls.html">List Left Sidebar</a></li>
            <li><a href="shop-list-rs.html">List Right Sidebar</a></li>
            <li><a href="shop-list-ns.html">List No Sidebar</a></li>
          </ul>
        </li>
        <li><a href="shop-single.html">Single Product</a></li>
        <li><a href="cart.html">Cart</a></li>
        <li class="has-children"><a href="checkout-address.html"><span>Checkout</span></a>
          <ul class="sub-menu">
            <li><a href="checkout-address.html">Address</a></li>
            <li><a href="checkout-shipping.html">Shipping</a></li>
            <li><a href="checkout-payment.html">Payment</a></li>
            <li><a href="checkout-review.html">Review</a></li>
            <li><a href="checkout-complete.html">Complete</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="has-megamenu"><a href="#"><span>Mega Menu</span></a>
      <ul class="mega-menu">
        <li><span class="mega-menu-title">Top Categories</span>
          <ul class="sub-menu">
            <li><a href="#">Men's Shoes</a></li>
            <li><a href="#">Women's Shoes</a></li>
            <li><a href="#">Shirts and Tops</a></li>
            <li><a href="#">Swimwear</a></li>
            <li><a href="#">Shorts and Pants</a></li>
            <li><a href="#">Accessories</a></li>
          </ul>
        </li>
        <li><span class="mega-menu-title">Specialty Shops</span>
          <ul class="sub-menu">
            <li><a href="#">Junior's Shop</a></li>
            <li><a href="#">Swim Shop</a></li>
            <li><a href="#">Athletic Shop</a></li>
            <li><a href="#">Outdoor Shop</a></li>
            <li><a href="#">Luxury Shop</a></li>
            <li><a href="#">Accessories Shop</a></li>
          </ul>
        </li>
        <li>
          <section class="promo-box" style="background-image: url(img/banners/02.jpg);"><span class="overlay-dark" style="opacity: .4;"></span>
            <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
              <h4 class="text-light text-thin text-shadow">New Collection of</h4>
              <h3 class="text-bold text-light text-shadow">Sunglasses</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
            </div>
          </section>
        </li>
        <li>
          <section class="promo-box" style="background-image: url(img/banners/03.jpg);">
            Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute. <span class="overlay-dark" style="opacity: .45;"></span>
            <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
              <h3 class="text-bold text-light text-shadow">Limited Offer</h3>
              <h4 class="text-light text-thin text-shadow">save up to 50%!</h4><a class="btn btn-sm btn-primary" href="#">Learn More</a>
            </div>
          </section>
        </li>
      </ul>
    </li>
    <li><a href="account-orders.html"><span>Account</span></a>
      <ul class="sub-menu">
        <li><a href="account-login.html">Login / Register</a></li>
        <li><a href="account-password-recovery.html">Password Recovery</a></li>
        <li><a href="account-orders.html">Orders List</a></li>
        <li><a href="account-wishlist.html">Wishlist</a></li>
        <li><a href="account-profile.html">Profile Page</a></li>
        <li><a href="account-address.html">Contact / Shipping Address</a></li>
        <li><a href="account-tickets.html">My Tickets</a></li>
        <li><a href="account-single-ticket.html">Single Ticket</a></li>
      </ul>
    </li>
    <li><a href="blog-rs.html"><span>Blog</span></a>
      <ul class="sub-menu">
        <li class="has-children"><a href="blog-rs.html"><span>Blog Layout</span></a>
          <ul class="sub-menu">
            <li><a href="blog-rs.html">Blog Right Sidebar</a></li>
            <li><a href="blog-ls.html">Blog Left Sidebar</a></li>
            <li><a href="blog-ns.html">Blog No Sidebar</a></li>
          </ul>
        </li>
        <li class="has-children"><a href="blog-single-rs.html"><span>Single Post Layout</span></a>
          <ul class="sub-menu">
            <li><a href="blog-single-rs.html">Post Right Sidebar</a></li>
            <li><a href="blog-single-ls.html">Post Left Sidebar</a></li>
            <li><a href="blog-single-ns.html">Post No Sidebar</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="#"><span>Pages</span></a>
      <ul class="sub-menu">
        <li><a href="about.html">About Us</a></li>
        <li><a href="contacts.html">Contacts</a></li>
        <li><a href="faq.html">Help / FAQ</a></li>
        <li><a href="order-tracking.html">Order Tracking</a></li>
        <li><a href="search-results.html">Search Results</a></li>
        <li><a href="404.html">404 Not Found</a></li>
        <li><a href="coming-soon.html">Coming Soon</a></li>
        <li><a class="text-danger" href="docs/dev-setup.html">Documentation</a></li>
      </ul>
    </li>
    <li class="has-megamenu"><a href="components/accordion.html"><span>Components</span></a>
      <ul class="mega-menu">
        <li><span class="mega-menu-title">A - F</span>
          <ul class="sub-menu">
            <li><a href="components/accordion.html">Accordion</a></li>
            <li><a href="components/alerts.html">Alerts</a></li>
            <li><a href="components/buttons.html">Buttons</a></li>
            <li><a href="components/cards.html">Cards</a></li>
            <li><a href="components/carousel.html">Carousel</a></li>
            <li><a href="components/countdown.html">Countdown</a></li>
            <li><a href="components/forms.html">Forms</a></li>
          </ul>
        </li>
        <li><span class="mega-menu-title">G - M</span>
          <ul class="sub-menu">
            <li><a href="components/gallery.html">Gallery</a></li>
            <li><a href="components/google-maps.html">Google Maps</a></li>
            <li><a href="components/images.html">Images &amp; Figures</a></li>
            <li><a href="components/list-group.html">List Group</a></li>
            <li><a href="components/market-social-buttons.html">Market &amp; Social Buttons</a></li>
            <li><a href="components/media.html">Media Object</a></li>
            <li><a href="components/modal.html">Modal</a></li>
          </ul>
        </li>
        <li><span class="mega-menu-title">P - T</span>
          <ul class="sub-menu">
            <li><a href="components/pagination.html">Pagination</a></li>
            <li><a href="components/pills.html">Pills</a></li>
            <li><a href="components/progress-bars.html">Progress Bars</a></li>
            <li><a href="components/shop-items.html">Shop Items</a></li>
            <li><a href="components/spinners.html">Spinners</a></li>
            <li><a href="components/steps.html">Steps</a></li>
            <li><a href="components/tables.html">Tables</a></li>
          </ul>
        </li>
        <li><span class="mega-menu-title">T - W</span>
          <ul class="sub-menu">
            <li><a href="components/tabs.html">Tabs</a></li>
            <li><a href="components/team.html">Team</a></li>
            <li><a href="components/toasts.html">Toast Notifications</a></li>
            <li><a href="components/tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
            <li><a href="components/typography.html">Typography</a></li>
            <li><a href="components/video-player.html">Video Player</a></li>
            <li><a href="components/widgets.html">Widgets</a></li>
          </ul>
        </li>
      </ul>
    </li>-->
  </ul>
</nav>