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
  <!-- Shop Filters Modal-->
  <div class="modal fade" id="modalShopFilters" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Filtros</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <!-- Widget Categories-->
          <section class="widget widget-categories">
            <h3 class="widget-title">Categorias</h3>
          

            <ul >
              <?php

              if (isset($_SESSION["lista"])) {

                $lista = $_SESSION["lista"];
              } else {
                $exec = new Tray();

                $lista = $exec->buscar("categories/tree");

                $_SESSION["lista"] = $lista;
              }

             
              for ($i = 0; $i < count($lista->Category); $i++) {
                print_r($lista->Category[$i]->Category->name);

                for ($j = 0; $j < count($lista->Category[$i]->Category->children); $j++) {

              ?>
              <li class="has-children expanded"><a href="/shop-grid-ls.php?c=re&category=<?php echo $lista->Category[$i]->Category->children[$j]->Category->id ?>"><?php echo $lista->Category[$i]->Category->children[$j]->Category->name ?></a>
                  <!-- <li  class="has-children expanded"><span><a href="#"></a><span class="sub-menu-toggle"></span></span> -->
                    <ul class="offcanvas-submenu">
                      <?php
                      for ($k = 0; $k < count($lista->Category[$i]->Category->children[$j]->Category->children); $k++) {
                      ?>

                        <li><a href="/shop-grid-ls.php?c=re&category=<?php echo $lista->Category[$i]->Category->children[$j]->Category->children[$k]->Category->id ?>"><?php echo $lista->Category[$i]->Category->children[$j]->Category->children[$k]->Category->name ?> </a></li>

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
          </section>
         
          <!-- <section class="widget widget-categories">
            <h3 class="widget-title">Price Range</h3>
            <form class="price-range-slider" method="post" data-start-min="250" data-start-max="650" data-min="0" data-max="1000" data-step="1">
              <div class="ui-range-slider"></div>
              <footer class="ui-range-slider-footer">
                <div class="column">
                  <button class="btn btn-outline-primary btn-sm" type="submit">Filter</button>
                </div>
                <div class="column">
                  <div class="ui-range-values">
                    <div class="ui-range-value-min">$<span></span>
                      <input type="hidden">
                    </div>&nbsp;-&nbsp;
                    <div class="ui-range-value-max">$<span></span>
                      <input type="hidden">
                    </div>
                  </div>
                </div>
              </footer>
            </form>
          </section>
         
          <section class="widget">
            <h3 class="widget-title">Filter by Brand</h3>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="adidas2">
              <label class="custom-control-label" for="adidas2">Adidas&nbsp;<span class="text-muted">(254)</span></label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="bilabong2">
              <label class="custom-control-label" for="bilabong2">Bilabong&nbsp;<span class="text-muted">(39)</span></label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="klein2">
              <label class="custom-control-label" for="klein2">Calvin Klein&nbsp;<span class="text-muted">(128)</span></label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="nike2">
              <label class="custom-control-label" for="nike2">Nike&nbsp;<span class="text-muted">(310)</span></label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="bahama2">
              <label class="custom-control-label" for="bahama2">Tommy Bahama&nbsp;<span class="text-muted">(42)</span></label>
            </div>
          </section>
         
          <section class="widget">
            <h3 class="widget-title">Filter by Size</h3>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="xl2">
              <label class="custom-control-label" for="xl2">XL&nbsp;<span class="text-muted">(208)</span></label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="l2">
              <label class="custom-control-label" for="l2">L&nbsp;<span class="text-muted">(311)</span></label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="m2">
              <label class="custom-control-label" for="m2">M&nbsp;<span class="text-muted">(485)</span></label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="s2">
              <label class="custom-control-label" for="s2">S&nbsp;<span class="text-muted">(213)</span></label>
            </div>
          </section>
        
          <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
         
            <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
              <h4 class="text-light text-thin text-shadow">New Collection of</h4>
              <h3 class="text-bold text-light text-shadow">Sunglassess</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
            </div>
          </section>  -->
        </div>
      </div>
    </div>
  </div>


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
  <!-- Navbar-->
  <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
  <!-- Off-Canvas Wrapper-->
  <div class="offcanvas-wrapper">
    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>Etiquetas e rótulos</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="index.html">Inicio</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
      <div class="row">
        <!-- Products-->
        <div class="col-xl-9 col-lg-8 order-lg-2">
          <!-- Shop Toolbar-->
          <div class="shop-toolbar padding-bottom-1x mb-2">
            <div class="column">
              <div class="shop-sorting">
                <label for="sorting">Sort by:</label>
                <select class="form-control" id="sorting">
                  <option>Popularity</option>
                  <option>Low - High Price</option>
                  <option>High - Low Price</option>
                  <option>Avarage Rating</option>
                  <option>A - Z Order</option>
                  <option>Z - A Order</option>
                </select><span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span>
              </div>
            </div>
            <div class="column">
              <div class="shop-view"><a class="grid-view active" href="shop-grid-ls.html"><span></span><span></span><span></span></a><a class="list-view" href="shop-list-ls.html"><span></span><span></span><span></span></a></div>
            </div>
          </div>
          <!-- Products Grid-->
          <div class="isotope-grid cols-3 mb-2">
            <div class="gutter-sizer"></div>
            <div class="grid-sizer"></div>

            <?php
            $tray = new Tray();

            $array[] = array(21);

            if(isset($_GET["category"])){
              $retorno = $tray->buscarProdutosDaCategoria($_GET["category"]);
            }else{
              $retorno = $tray->buscar("products");
            }
            

            // print_r($retorno->Products);

            for ($i = 0; $i < count($retorno->Products); $i++) {
              //print_r($retorno->Products[$i]->Product->name);
              $produto = $retorno->Products[$i]->Product;
              //print_r($produto->ProductImage[0]->https);
            ?>
              <div class="grid-item">
                <div class="product-card">
                  <div class="product-badge text-danger"></div><a class="product-thumb" href="shop-single.php?id=<?php echo $produto->id ?>"><img src="<?php echo $produto->ProductImage[0]->https ?>" alt="Product"></a>
                  <h3 class="product-title"><a href="shop-single.php?id=<?php echo $produto->id ?>"><?php echo $produto->name ?></a></h3>
                  <h4 class="product-price">
                    <!-- <del>$99.99</del>$49.99 -->
                    R$ <?php echo $produto->price ?>
                  </h4>
                  <div class="product-buttons">
                    <!-- <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button> -->
                    <button id="btn_add_carrinho" class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-whatever="deu sim" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="<?php echo $produto->name ?>" data-toast-message="adicionado ao carrinho.">Adicionar no carrinho</button>
                  </div>
                </div>
              </div>
            <?php
            }

            ?>


            <!-- Product
            <div class="grid-item">
              <div class="product-card">
                <div class="product-badge text-danger">50% Off</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/01.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Unionbay Park</a></h3>
                <h4 class="product-price">
                  <del>$99.99</del>$49.99
                </h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
           
            <div class="grid-item">
              <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/02.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Cole Haan Crossbody</a></h3>
                <h4 class="product-price">$200.00</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
    
            <div class="grid-item">
              <div class="product-card">
                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                </div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/03.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Oakley Kickback</a></h3>
                <h4 class="product-price">$155.00</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
             <div class="grid-item">
              <div class="product-card">
                <div class="product-badge text-muted">Out of stock</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/08.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Off the Shoulder Top</a></h3>
                <h4 class="product-price">$128.00</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button><a class="btn btn-outline-secondary btn-sm" href="shop-single.html">View Details</a>
                </div>
              </div>
            </div>
    
            <div class="grid-item">
              <div class="product-card">
                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i><i class="icon-star"></i>
                </div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/05.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Jordan City Man's Hoodie</a></h3>
                <h4 class="product-price">$65.00</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
      
            <div class="grid-item">
              <div class="product-card">
                <div class="product-badge text-danger">40% Off</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/06.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Palace Shell Track Jacket</a></h3>
                <h4 class="product-price">
                  <del>$60.00</del>$36.00
                </h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
      
            <div class="grid-item">
              <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/04.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Waist Leather Belt</a></h3>
                <h4 class="product-price">$47.00</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
                     <div class="grid-item">
              <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/10.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Daily Fabric Cap</a></h3>
                <h4 class="product-price">$31.99</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
  
            <div class="grid-item">
              <div class="product-card">
                <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i>
                </div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/11.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Top-Sider Fathom</a></h3>
                <h4 class="product-price">$90.00</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
     
            <div class="grid-item">
              <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/16.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Big Wordmark Tote</a></h3>
                <h4 class="product-price">$29.99</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
        
            <div class="grid-item">
              <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/14.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Skagen Holst Watch</a></h3>
                <h4 class="product-price">$145.00</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div>
          
            <div class="grid-item">
              <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/15.jpg" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.html">Metal Star Earings</a></h3>
                <h4 class="product-price">$90.00</h4>
                <div class="product-buttons">
                  <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                </div>
              </div>
            </div> -->
          </div>
          <!-- Pagination-->
          <nav class="pagination">
            <div class="column">
              <ul class="pages">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li>...</li>
                <li><a href="#">12</a></li>
              </ul>
            </div>
            <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
          </nav>
        </div>
        <!-- Sidebar          -->
        <div class="col-xl-3 col-lg-4 order-lg-1">
          <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
          <aside class="sidebar sidebar-offcanvas">
            <!-- Widget Categories-->
            <section class="widget widget-categories">
              <h3 class="widget-title">Categorias</h3>
              <ul >
              <?php

              if (isset($_SESSION["lista"])) {

                $lista = $_SESSION["lista"];
              } else {
                $exec = new Tray();

                $lista = $exec->buscar("categories/tree");

                $_SESSION["lista"] = $lista;
              }

             
              for ($i = 0; $i < count($lista->Category); $i++) {
                print_r($lista->Category[$i]->Category->name);

                for ($j = 0; $j < count($lista->Category[$i]->Category->children); $j++) {

              ?>
              <li class="has-children expanded"><a href="/shop-grid-ls.php?c=re&category=<?php echo $lista->Category[$i]->Category->children[$j]->Category->id ?>"><?php echo $lista->Category[$i]->Category->children[$j]->Category->name ?></a>
                  <!-- <li  class="has-children expanded"><span><a href="#"></a><span class="sub-menu-toggle"></span></span> -->
                    <ul class="offcanvas-submenu">
                      <?php
                      for ($k = 0; $k < count($lista->Category[$i]->Category->children[$j]->Category->children); $k++) {
                      ?>

                        <li><a href="/shop-grid-ls.php?c=re&category=<?php echo $lista->Category[$i]->Category->children[$j]->Category->children[$k]->Category->id ?>"><?php echo $lista->Category[$i]->Category->children[$j]->Category->children[$k]->Category->name ?> </a></li>

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
            </section>
            <!-- Widget Price Range-->
            <section class="widget widget-categories">
              <h3 class="widget-title">Price Range</h3>
              <form class="price-range-slider" method="post" data-start-min="250" data-start-max="650" data-min="0" data-max="1000" data-step="1">
                <div class="ui-range-slider"></div>
                <footer class="ui-range-slider-footer">
                  <div class="column">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Filter</button>
                  </div>
                  <div class="column">
                    <div class="ui-range-values">
                      <div class="ui-range-value-min">$<span></span>
                        <input type="hidden">
                      </div>&nbsp;-&nbsp;
                      <div class="ui-range-value-max">$<span></span>
                        <input type="hidden">
                      </div>
                    </div>
                  </div>
                </footer>
              </form>
            </section>
            <!-- Widget Brand Filter-->
            <section class="widget">
              <h3 class="widget-title">Filter by Brand</h3>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="adidas">
                <label class="custom-control-label" for="adidas">Adidas&nbsp;<span class="text-muted">(254)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="bilabong">
                <label class="custom-control-label" for="bilabong">Bilabong&nbsp;<span class="text-muted">(39)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="klein">
                <label class="custom-control-label" for="klein">Calvin Klein&nbsp;<span class="text-muted">(128)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="nike">
                <label class="custom-control-label" for="nike">Nike&nbsp;<span class="text-muted">(310)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="bahama">
                <label class="custom-control-label" for="bahama">Tommy Bahama&nbsp;<span class="text-muted">(42)</span></label>
              </div>
            </section>
            <!-- Widget Size Filter-->
            <section class="widget">
              <h3 class="widget-title">Filter by Size</h3>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="xl">
                <label class="custom-control-label" for="xl">XL&nbsp;<span class="text-muted">(208)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="l">
                <label class="custom-control-label" for="l">L&nbsp;<span class="text-muted">(311)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="m">
                <label class="custom-control-label" for="m">M&nbsp;<span class="text-muted">(485)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="s">
                <label class="custom-control-label" for="s">S&nbsp;<span class="text-muted">(213)</span></label>
              </div>
            </section>
            <!-- Promo Banner-->
            <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
              <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
              <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                <h4 class="text-light text-thin text-shadow">New Collection of</h4>
                <h3 class="text-bold text-light text-shadow">Sunglassess</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
              </div>
            </section>
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
  <script src="js/fesper.js"></script>
</body>

</html>