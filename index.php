<?php

include 'vendeur/components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'vendeur/components/add_cart.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
    <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen" />
    <link href="themes/css/base.css" rel="stylesheet" media="screen" />
    <!-- Bootstrap style responsive -->
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <!-- Google-code-prettify -->
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet" />
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="themes/images/ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="themes/images/ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="themes/images/ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-72-precomposed.png" />
    <style type="text/css" id="enject"></style>
</head>
<style>
#blockView {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(calc(33.33% - 20px), 1fr));
    /* Trois produits par ligne */
    gap: 20px;
    /* Espacement entre les produits */
    justify-content: center;
    /* Centrage horizontal des produits */
}

/* Produits */
.product {
    width: 80%;
    /* Les produits occupent toute la largeur de la colonne de la grille */
}
</style>

<body>
    <?php include 'components_client/header.php'; ?>

    <div id="carouselBlk">
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="container">
                        <a href="register.html"><img style="width: 100%" src="themes/images/carousel/1.png"
                                alt="special offers" /></a>
                        <div class="carousel-caption">
                            <h4>Second Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                Donec id elit non mi porta gravida at eget metus. Nullam id
                                dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <a href="register.html"><img style="width: 100%" src="themes/images/carousel/2.png"
                                alt="" /></a>
                        <div class="carousel-caption">
                            <h4>Second Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                Donec id elit non mi porta gravida at eget metus. Nullam id
                                dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <a href="register.html"><img src="themes/images/carousel/3.png" alt="" /></a>
                        <div class="carousel-caption">
                            <h4>Second Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                Donec id elit non mi porta gravida at eget metus. Nullam id
                                dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <a href="register.html"><img src="themes/images/carousel/4.png" alt="" /></a>
                        <div class="carousel-caption">
                            <h4>Second Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                Donec id elit non mi porta gravida at eget metus. Nullam id
                                dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <a href="register.html"><img src="themes/images/carousel/5.png" alt="" /></a>
                        <div class="carousel-caption">
                            <h4>Second Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                Donec id elit non mi porta gravida at eget metus. Nullam id
                                dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <a href="register.html"><img src="themes/images/carousel/6.png" alt="" /></a>
                        <div class="carousel-caption">
                            <h4>Second Thumbnail label</h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                Donec id elit non mi porta gravida at eget metus. Nullam id
                                dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
    </div>
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <?php include 'components_client/sidebar.php'; ?>
                <div class="span9">
                    <?php include 'components_client/new_prod.php'; ?>
                    <div class="tab-content">
                        <div cclass="tab-pane active" id="blockView">
                            <?php
    $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
    $select_products->execute();
    if ($select_products->rowCount() > 0) {
        while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                            <form method="post">
                                <!-- Champs cachés pour les informations sur le produit -->
                                <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                                <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                                <input type="hidden" name="description" value="<?= $fetch_product['description']; ?>">
                                <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                                <input type="hidden" name="image" value="<?= $fetch_product['image']; ?>">

                                <!-- Contenu du produit -->
                                <ul id="productList" class="thumbnails products">

                                    <li class="span3 product" data-name="<?= $fetch_product['name']; ?>"
                                        data-price="<?= $fetch_product['price']; ?>">
                                        <div class="thumbnail">
                                            <a href="product_details.php">
                                                <img src="../shop_mini_projet/vendeur/uploaded_img/<?= $fetch_product['image']; ?>"
                                                    alt="" />
                                            </a>
                                            <div class="caption">
                                                <h5><?= $fetch_product['name']; ?></h5>
                                                <p><?= $fetch_product['description']; ?></p>
                                                <h4 style="text-align: center">
                                                    <a class="btn" href="product_details.php"><i
                                                            class="icon-zoom-in"></i></a>
                                                    <!-- Bouton "Add to Cart" comme bouton de soumission du formulaire -->
                                                    <button type="submit" class="btn" name="add_to_cart">Add to <i
                                                            class="icon-shopping-cart"></i></button>
                                                    <a class="btn btn-primary"
                                                        href="#"><span>$</span><?= $fetch_product['price']; ?></a>
                                                    <input type="number" name="qty" class="qty" min="1" max="99"
                                                        value="1" maxlength="2">
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </form>
                            <?php
        }
    } else {
        echo '<p class="empty">No products added yet!</p>';
    }
    ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php include 'components_client/footer.php'; ?>
        <!-- Placed at the end of the document so the pages load faster ============================================= -->
        <script src="themes/js/jquery.js" type="text/javascript"></script>
        <script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="themes/js/google-code-prettify/prettify.js"></script>

        <script src="themes/js/bootshop.js"></script>
        <script src="themes/js/jquery.lightbox-0.5.js"></script>

        <!-- Themes switcher section ============================================================================================= -->
        <div id="secectionBox">
            <link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
            <script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
            <div id="themeContainer">
                <div id="hideme" class="themeTitle">Style Selector</div>
                <div class="themeName">Oregional Skin</div>
                <div class="images style">
                    <a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png"
                            alt="bootstrap business templates" class="active" /></a>
                    <a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png"
                            alt="bootstrap business templates" class="active" /></a>
                </div>
                <div class="themeName">Bootswatch Skins (11)</div>
                <div class="images style">
                    <a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="superhero" title="Superhero"><img
                            src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png"
                            alt="bootstrap business templates" /></a>
                    <p style="
              margin: 0;
              line-height: normal;
              margin-left: -10px;
              display: none;
            ">
                        <small>These are just examples and you can build your own color scheme
                            in the backend.</small>
                    </p>
                </div>
                <div class="themeName">Background Patterns</div>
                <div class="images patterns">
                    <a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png"
                            alt="bootstrap business templates" class="active" /></a>
                    <a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png"
                            alt="bootstrap business templates" /></a>

                    <a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png"
                            alt="bootstrap business templates" /></a>

                    <a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png"
                            alt="bootstrap business templates" /></a>
                    <a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png"
                            alt="bootstrap business templates" /></a>
                </div>
            </div>
        </div>
        <span id="themesBtn"></span>
</body>

</html>