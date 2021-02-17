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


  // Pego o id do produto que deve ser mostrado o detalhe
  $idProduto = $_GET["id"];

  $tray = new Tray();

  $objProduto = $tray->buscarDetalhesDoProduto($idProduto);

  $produto = $objProduto->Products[0]->Product;

  //print_r($objProduto->Products[0]->Product->ProductImage[0]->http);
  ?>

  <!-- Off-Canvas Wrapper-->
  <div class="offcanvas-wrapper">
    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>Detalhe do produto</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="index.php">Inicio</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li><a href="shop-grid-ls.html">Shop</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>Detalhe do produto</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
      <div class="row">
        <!-- Poduct Gallery-->
        <div class="col-md-6">
          <div class="product-gallery"><span class="product-badge text-danger">30% Off</span>
            <div class="gallery-wrapper">
              <div class="gallery-item video-btn text-center"><a href="#" data-toggle="tooltip" data-type="video" data-video="&lt;div class=&quot;wrapper&quot;&gt;&lt;div class=&quot;video-wrapper&quot;&gt;&lt;iframe class=&quot;pswp__video&quot; width=&quot;960&quot; height=&quot;640&quot; src=&quot;//www.youtube.com/embed/B81qd2v6alw?rel=0&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;&lt;/div&gt;&lt;/div&gt;" title="Watch video"></a></div>
            </div>
            <div class="product-carousel owl-carousel gallery-wrapper">
              <?php
              $cont = 0;
              foreach ($produto->ProductImage as $pro) {
                // var_dump($pro->thumbs;);
                // print_r($pro->thumbs->{90}->http);


              ?>

                <div class="gallery-item" data-hash="<?php echo $cont ?>ref"><a href="#" data-size="500"><img src="<?php echo $pro->http ?>" alt="Product"></a></div>

              <?php
                $cont++;
              }

              ?>

            </div>
            <ul class="product-thumbnails">
              <?php
              $cont = 0;
              foreach ($produto->ProductImage as $pro) {
                //print_r($pro->thumbs->{90}->http);

                if ($cont == 0) {
              ?>
                  <li class="active"><a href="#<?php echo $cont ?>ref"><img src="<?php echo $pro->thumbs->{90}->http ?>" alt="Product"></a></li>
                <?php

                } else {
                ?>
                  <li><a href="#<?php echo $cont ?>ref"><img src="<?php echo $pro->thumbs->{90}->http ?>" alt="Product"></a></li>
              <?php
                }


                $cont++;
              }
              ?>


            </ul>
          </div>
        </div>
        <!-- Product Info-->
        <div class="col-md-6">
          <div class="padding-top-2x mt-2 hidden-md-up"></div>
          <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
          <!-- </div><span class="text-muted align-middle">&nbsp;&nbsp;4.2 | 3 customer reviews</span> -->
          <h2 class="padding-top-1x text-normal"><?php echo $produto->name ?></h2><span class="h2 d-block">
            R$ <?php echo $produto->price ?></span>
          <p><?php echo $produto->description ?></p>
        
          <div class="pt-1 mb-2"><span class="text-medium">Estoque disponivel:</span> <?php echo $produto->stock ?></div>
          <div class="padding-bottom-1x mb-2"><span class="text-medium">Categorias:&nbsp;</span><a class="navi-link" href="#">Men’s shoes,</a><a class="navi-link" href="#"> Snickers,</a><a class="navi-link" href="#"> Sport shoes</a></div>
          <hr class="mb-3">
          <div class="d-flex flex-wrap justify-content-between">
            <div class="entry-share mt-2 mb-2"><span class="text-muted">Share:</span>
              <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
            </div>
            <div class="sp-buttons mt-2 mb-2">
              <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
              <button class="btn btn-primary" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="<?php echo $produto->name ?>" data-toast-message="adicionado ao carrinho com sucesso!"><i class="icon-bag"></i> Adicionar ao carrinho</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Product Tabs-->
      <div class="row padding-top-3x mb-3">
        <div class="col-lg-10 offset-lg-1">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab">Description</a></li>
            <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Reviews (3)</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="description" role="tabpanel">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error blanditiis a, deserunt magnam pariatur quam suscipit quae. Veniam, deserunt reprehenderit quasi hic recusandae itaque omnis fugiat animi architecto facilis repellendus. Commodi dolorem, eius consectetur. Amet maiores nemo at nobi s aspernatur velit, sequi odio, a veritatis inventore autem esse provident in? Placeat, sunt!</p>
              <p class="mb-30">Iste assumenda, vitae, aliquam excepturi libero quia ullam quisquam tenetur id sint labore. Pariatur praesentium velit, fugit facere maxime voluptates optio qui? Quidem obcaecati necessitatibus rem aspernatur, mollitia, assumenda explicabo numquam minus eos sapiente totam dicta, laborum dolorum! Vitae distinctio quos non ut fugiat.</p>
              <div class="row">
                <div class="col-sm-6">
                  <dl>
                    <dt>Materials:</dt>
                    <dd>Leather, Cotton, Rubber, Foam</dd>
                    <dt>Available Sizes:</dt>
                    <dd>8.5, 9.0, 9.5, 10.0, 10.5, 11.0, 11.5</dd>
                    <dt>Available Colors:</dt>
                    <dd>White/Red/Blue, Black/Orange/Green</dd>
                  </dl>
                </div>
                <div class="col-sm-6">
                  <dl>
                    <dt>Model Year:</dt>
                    <dd>2016</dd>
                    <dt>Manufacturer:</dt>
                    <dd>Reebok Inc.</dd>
                    <dt>Made In:</dt>
                    <dd>Taiwan</dd>
                  </dl>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel">
              <!-- Review-->
              <div class="comment">
                <div class="comment-author-ava"><img src="img/reviews/01.jpg" alt="Review author"></div>
                <div class="comment-body">
                  <div class="comment-header d-flex flex-wrap justify-content-between">
                    <h4 class="comment-title">Average quality for the price</h4>
                    <div class="mb-2">
                      <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i><i class="icon-star"></i>
                      </div>
                    </div>
                  </div>
                  <p class="comment-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                  <div class="comment-footer"><span class="comment-meta">Francis Burton</span></div>
                </div>
              </div>
              <!-- Review-->
              <div class="comment">
                <div class="comment-author-ava"><img src="img/reviews/02.jpg" alt="Review author"></div>
                <div class="comment-body">
                  <div class="comment-header d-flex flex-wrap justify-content-between">
                    <h4 class="comment-title">My husband love his new...</h4>
                    <div class="mb-2">
                      <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i>
                      </div>
                    </div>
                  </div>
                  <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <div class="comment-footer"><span class="comment-meta">Maggie Scott</span></div>
                </div>
              </div>
              <!-- Review-->
              <div class="comment">
                <div class="comment-author-ava"><img src="img/reviews/03.jpg" alt="Review author"></div>
                <div class="comment-body">
                  <div class="comment-header d-flex flex-wrap justify-content-between">
                    <h4 class="comment-title">Soft, comfortable, quite durable...</h4>
                    <div class="mb-2">
                      <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                      </div>
                    </div>
                  </div>
                  <p class="comment-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                  <div class="comment-footer"><span class="comment-meta">Jacob Hammond</span></div>
                </div>
              </div>
              <!-- Review Form-->
              <h5 class="mb-30 padding-top-1x">Leave Review</h5>
              <form class="row" method="post">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="review_name">Your Name</label>
                    <input class="form-control form-control-rounded" type="text" id="review_name" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="review_email">Your Email</label>
                    <input class="form-control form-control-rounded" type="email" id="review_email" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="review_subject">Subject</label>
                    <input class="form-control form-control-rounded" type="text" id="review_subject" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="review_rating">Rating</label>
                    <select class="form-control form-control-rounded" id="review_rating">
                      <option>5 Stars</option>
                      <option>4 Stars</option>
                      <option>3 Stars</option>
                      <option>2 Stars</option>
                      <option>1 Star</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="review_text">Review </label>
                    <textarea class="form-control form-control-rounded" id="review_text" rows="8" required></textarea>
                  </div>
                </div>
                <div class="col-12 text-right">
                  <button class="btn btn-outline-primary" type="submit">Submit Review</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Related Products Carousel-->
      <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
      <!-- Carousel-->
      <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
        <!-- Product-->
        <div class="grid-item">
          <div class="product-card">
            <div class="product-badge text-danger">22% Off</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/09.jpg" alt="Product"></a>
            <h3 class="product-title"><a href="shop-single.html">Rocket Dog</a></h3>
            <h4 class="product-price">
              <del>$44.95</del>$34.99
            </h4>
            <div class="product-buttons">
              <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
              <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
            </div>
          </div>
        </div>
        <!-- Product-->
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
        <!-- Product-->
        <div class="grid-item">
          <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/12.jpg" alt="Product"></a>
            <h3 class="product-title"><a href="shop-single.html">Vented Straw Fedora</a></h3>
            <h4 class="product-price">$49.50</h4>
            <div class="product-buttons">
              <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
              <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
            </div>
          </div>
        </div>
        <!-- Product-->
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
        <!-- Product-->
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
        <!-- Product-->
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
      </div>
    </div>
    <!-- Site Footer-->
    <?php
    include "./estrutura/footer.php";
    ?>
  </div>
  <!-- Photoswipe container-->
  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <button class="pswp__button pswp__button--share" title="Share"></button>
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div>
        </div>
        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
  <!-- Backdrop-->
  <div class="site-backdrop"></div>
  <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
  <script src="js/vendor.min.js"></script>
  <script src="js/scripts.min.js"></script>
</body>

</html>