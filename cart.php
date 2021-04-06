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
  <div class="modal fade" id="modalExcluirItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir item do carrinho</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            x
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" id="id_produto" name="id_produto">
          <p>Tem certeza que deseja excluir este produto do carrinho ?</p>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-danger" onclick="excluirItemCarrinho()">Confirmar</button>

        </div>

      </div>
    </div>
  </div>
  <!-- Off-Canvas Wrapper-->
  <div class="offcanvas-wrapper">
    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>Carrinho de compras</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="index.php">Inicio</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>Carrinho</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">

      <!-- Shopping Cart-->
      <div class="table-responsive shopping-cart">
        <table class="table">
          <thead>
            <tr>
              <th>Produto</th>
              <th class="text-center">Quantidade</th>
              <th class="text-center">Subtotal</th>

              <th class="text-center">
              <?php   
               $tray = new Tray();

               $carrinho = $tray->buscarCarrinhoCompleto(session_id());
               print_r($carrinho);
               if ($carrinho == null) {
                $carrinhoVazio = true;
               }
              $vazio = "";
              if($carrinhoVazio){
                $vazio = "disabled";
              }

              ?>
                <button type="button" <?php echo $vazio ?>  class="btn btn-danger" data-toggle="modal" data-target="#modalExcluirItem">
                  Limpar carrinho
                </button>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
           
           
            if ($carrinho !== null) {
              foreach ($carrinho->Cart->Products as $key => $value) {

            ?>
                <tr>
                  <td>
                    <div class="product-item">
                      <a class="product-thumb" href="shop-single.html">
                        <?php
                        foreach ($value->ProductImage as $pro) {

                        ?>
                          <img src="<?php echo $pro->thumbs->{90}->http ?>" alt="Product">


                        <?php
                        }
                        ?>
                      </a>
                      <div class="product-info">
                        <h4 class="product-title"><a href="shop-single.php?id=<?php echo $value->id ?>"><?php echo $value->name ?></a></h4><span><em>Categoria:</em> <?php echo $value->Category->name ?></span>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <div class="count-input">
                      <input class="text" style="width: 60px;" value=" <?php echo $value->quantity ?>" />
                    </div>
                  </td>
                  <td class="text-center text-lg text-medium">R$ <?php echo $value->sub_total  ?> </td>
                  <td class="text-center"> <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalExcluirItem" data-idproduto="<?php echo $value->id ?>" data-nomeproduto="<?php echo $value->name  ?>"><i class="icon-cross"></i></button></td>
                  <!-- <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td> -->
                </tr>
              <?php
              }
            } else {
              ?>
              <tr>
                <td colspan="4" class="text-center">
                  <h3>Seu carrinho está vazio</h3>
                </td>
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>
      </div>
      <div class="shopping-cart-footer">
        <div class="column">
          <!-- <form class="coupon-form" method="post">
            <input class="form-control form-control-sm" type="text" placeholder="Coupon code" required>
            <button class="btn btn-outline-primary btn-sm" type="submit">Apply Coupon</button>
          </form> -->
        </div>
        <div class="column text-lg">Subtotal: <span class="text-medium">$289.68</span></div>
      </div>
      <div class="shopping-cart-footer">
        <div class="column"><a class="btn btn-outline-secondary" href="shop-grid-ls.php"><i class="icon-arrow-left"></i>&nbsp;Continuar as compras</a></div>
        <div class="column"><a class="btn btn-primary" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Update Cart</a><a class="btn btn-success" href="checkout-address.php">Checkout</a></div>
      </div>
      <!-- Related Products Carousel-->
      <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">Você pode gostar também... </h3>
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
  <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
  <!-- Backdrop-->
  <div class="site-backdrop"></div>
  <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
  <script src="js/vendor.min.js"></script>
  <script src="js/scripts.min.js"></script>
  <script>
    $('#modalExcluirItem').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var idproduto = button.data('idproduto') // Extract info from data-* attributes
      var nome = button.data('nomeproduto')

      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Excluir o produto: ' + nome)

      modal.find('#id_produto').val(idproduto)
    });

    function excluirItemCarrinho() {
      //alert(document.getElementById("id_produto").value);

      $.post('/tray/controller/CartsController.php', {
        idProduto: document.getElementById("id_produto").value,

        acao: "excluir"
      }, function(data) {
        $('#modalExcluirItem').modal('hide')
        console.log(data)
        setTimeout(function() {
          window.location.reload(1);
        }, 1000); // 3 minutos
      });
    }
  </script>
</body>

</html>