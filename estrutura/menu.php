<div class="offcanvas-container" id="shop-categories">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title">Categorias</h3>
    </div>
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

           // print_r($lista);
            for ($i = 0; $i < count($lista->Category); $i++) {
                print_r($lista->Category[$i]->Category->name);

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