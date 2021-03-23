<?php
include "./tray/Tray.php";

// FAço a  verificação se essa pagina foi acessada diretamente, caso tenha sido,
// redirtecionamos o usuario para a pagina inicial do site
if (isset($_GET["id"])) {
  session_start();

} else {
  header('Location: /');
}

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

  $produto = $objProduto->Product;

  $produtosDaCategoria = $tray->buscarProdutosDaCategoria($produto->category_id);

  ?>

  <!-- Off-Canvas Wrapper-->
  <div class="offcanvas-wrapper">

    <!-- Position it -->
    <div style="position: absolute; top: 0; right: 0;" id="mensagemToast">

    </div>
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
          <div class="product-gallery">
            <div class="gallery-wrapper">
              <!-- <div class="gallery-item video-btn text-center"><a href="#" data-toggle="tooltip" data-type="video" data-video="&lt;div class=&quot;wrapper&quot;&gt;&lt;div class=&quot;video-wrapper&quot;&gt;&lt;iframe class=&quot;pswp__video&quot; width=&quot;960&quot; height=&quot;640&quot; src=&quot;//www.youtube.com/embed/B81qd2v6alw?rel=0&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;&lt;/div&gt;&lt;/div&gt;" title="Watch video"></a></div> -->
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
            <label>Quantidade:</label>
            <input type="button" id="plus" value='-' onclick="process(-1)" />
            <input id="quant" name="quant" class="text" type="number" value="1" maxlength="<?php echo $produto->available ?>" />
            <input type="button" id="minus" value='+' onclick="process(1)">

            <div class="pt-1 mb-2"><span class="text-medium">Estoque disponivel:</span> <?php echo $produto->available ?></div>
            <div class="padding-bottom-1x mb-2"><span class="text-medium">Categorias:&nbsp;</span><a class="navi-link" href="#"><?php echo $produto->category_name ?> </a></div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between">
              <div class="entry-share mt-2 mb-2"><span class="text-muted">Share:</span>
                <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
              </div>
              <div class="sp-buttons mt-2 mb-2">
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                <button class="btn btn-primary" id="btn_addCarts" data-idProduto="<?php echo $idProduto ?>" data-quant="1" data-preco="<?php echo $produto->price ?>" data-toast-message="adicionado ao carrinho com sucesso!"><i class="icon-bag"></i> Adicionar ao carrinho</button>
                <!-- <button class="btn btn-primary" id="btn_addCarts"><i class="icon-bag"></i> Adicionar ao carrinho</button> -->
              </div>
            </div>
          </div>
        </div>
        <!-- Product Tabs-->
        <div class="row padding-top-3x mb-3">
          <div class="col-lg-10 offset-lg-1">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab">Descrição</a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Reviews (3)</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="description" role="tabpanel">
                <p><?php echo $produto->description ?></p>
              </div>

            </div>
          </div>
        </div>
        <!-- Related Products Carousel-->
        <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">Você pode gostar</h3>
        <!-- Carousel-->
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">

          <?php

          for ($i = 0; $i < count($produtosDaCategoria->Products); $i++) {

          ?>
            <!-- Product-->
            <div class="grid-item">
              <div class="product-card">
                <div class="product-badge text-danger"></div><a class="product-thumb" href="shop-single.php?id=<?php echo $produtosDaCategoria->Products[$i]->Product->id ?>"><img src="<?php echo $produtosDaCategoria->Products[$i]->Product->ProductImage[0]->http ?>" alt="Product"></a>
                <h3 class="product-title"><a href="shop-single.php?id=<?php echo $produtosDaCategoria->Products[$i]->Product->id ?>"><?php echo $produtosDaCategoria->Products[$i]->Product->name ?></a></h3>
                <h4 class="product-price">
                  R$ <?php echo $produtosDaCategoria->Products[$i]->Product->price ?>
                </h4>
                <div class="product-buttons">
                  <!-- <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button> -->
                  <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="<?php echo $produtosDaCategoria->Products[$i]->Product->name ?>" data-toast-message="adicionado ao carrinho com sucesso!">Adicionar ao carrinho</button>
                </div>
              </div>
            </div>

          <?php

          }
          ?>


        </div>
      </div>

      <div class="toast">
        <div class="toast-header">
          Toast Header
        </div>
        <div class="toast-body">
          Some text inside the toast body
        </div>
      </div>
      <!-- Site Footer-->

    </div>
    <?php
    include "./estrutura/footer.php";
    ?>
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

    <script>
      $("#btn_addCarts").on("click", function() {


        var dado = $('#btn_addCarts').attr('data-idProduto');
        var quant = $('#btn_addCarts').attr('data-quant');
        var preco = $('#btn_addCarts').attr('data-preco');



        $.post('/tray/controller/CartsController.php?acao=add', {
          idProduto: dado,
          preco: preco,
          quant: quant,
          acao: "add"
        }, function(data) {
          console.log(data)
          // var mensagem = document.getElementById('mensagemToast');

          var str = "<div id=\"mensagemAviso\" class=\"toast alert-success\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\" style=\"width: 350px;\">";
          str += "<div class=\"toast-header text-center\">";
          str += "<strong class=\"mr-auto \">Aviso</strong>"
          str += "<button type=\"button\" class=\"ml-2 mb-1 close\" data-dismiss=\"toast\" aria-label=\"Close\">"
          str += "<span aria-hidden=\"true\">&times;</span>"
          str += "</button>"
          str += "</div>"
          str += "<div class=\"toast-body text-center\">"
          str += "Estoque indisponivel no momento."
          str += "</div>"
          str += "</div>"



          var tituloSucesso;
          var mensagemSucesso;

          if (data.match('Stock insufficient to this quantity')) {
            var mensagem = document.getElementById('mensagemToast');
            mensagem.innerHTML = str;

            $('#mensagemAviso').toast({
              animation: true,
              delay: 4000
            });
            $('#mensagemAviso').toast('show')
            $('#mensagemAviso').addClass("alert-warning");
          } else if (data.match('Created')) {
            var mensagem = document.getElementById('mensagemToast');

            tituloSucesso = "Carrinho criado - Boas compras";
            mensagemSucesso = "Produto adicionado com sucesso ao carrinho !";

            mensagem.innerHTML = montarMensagemSucesso(tituloSucesso, mensagemSucesso);

            $('#mensagemSucesso').toast({
              animation: true,
              delay: 4000
            });
            $('#mensagemSucesso').toast('show')
            $('#mensagemSucesso').addClass("alert-success");

            atualizarCarrinho();
          } else if (data.match('Saved')) {
            var mensagem = document.getElementById('mensagemToast');

            tituloSucesso = "Boas compras";
            mensagemSucesso = "Produto adicionado com sucesso ao carrinho !";

            mensagem.innerHTML = montarMensagemSucesso(tituloSucesso, mensagemSucesso);

            $('#mensagemSucesso').toast({
              animation: true,
              delay: 4000
            });
            $('#mensagemSucesso').toast('show')
            $('#mensagemSucesso').addClass("alert-success");

            atualizarCarrinho();
          }
          var menu = document.getElementById('carrinhoButton');


        });

      });

      function montarMensagemSucesso(titulo, mensagem) {
        var strSucesso = "<div id=\"mensagemSucesso\" class=\"toast alert-success\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\" style=\"width: 350px;\">";
        strSucesso += "<div class=\"toast-header text-center\">";
        strSucesso += "<strong class=\"mr-auto \">" + titulo + "</strong>"
        strSucesso += "<button type=\"button\" class=\"ml-2 mb-1 close\" data-dismiss=\"toast\" aria-label=\"Close\">"
        strSucesso += "<span aria-hidden=\"true\">&times;</span>"
        strSucesso += "</button>"
        strSucesso += "</div>"
        strSucesso += "<div class=\"toast-body text-center\">"
        strSucesso += mensagem;
        strSucesso += "</div>"
        strSucesso += "</div>"

        return strSucesso;
      }

      function process(quant) {
        var value = parseInt(document.getElementById("quant").value);
        value += quant;
        if (value < 1) {
          document.getElementById("quant").value = 1;
        } else {
          document.getElementById("quant").value = value;
        }
      }

      function atualizarCarrinho() {
        $.post('/tray/controller/CartsController.php?acao=refresh', {
          acao: "refresh"
        }, function(data) {
          const obj = JSON.parse(data);
          
           quant = 0;
          obj.Products.forEach(function(nome, i) {
            
            quant = quant + parseInt(nome.quantity);
          })
          console.log(quant);
          document.getElementById('total_carrinho').innerHTML = "R$ " + obj.total;
          document.getElementById('quantCarrinho').innerHTML = quant;
        });
      }
    </script>
</body>

</html>