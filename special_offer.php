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
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png" />
    <style type="text/css" id="enject"></style>
</head>


<body>

    <?php include 'components_client/header.php'; ?>
    <!-- Header End====================================================================== -->
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
                <?php include 'components_client/sidebar.php'; ?>
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a> <span class="divider">/</span>
                        </li>
                        <li class="active">Special offers</li>
                    </ul>
                    <h4>
                        20% Discount Special offer<small class="pull-right">
                            40 products are available
                        </small>
                    </h4>
                    <hr class="soft" />
                    <form class="form-horizontal span6">
                        <div class="control-group">
                            <label class="control-label alignL">Sort By </label>
                            <select id="sortSelect">
                                <option value="name_asc">Product name A - Z</option>
                                <option value="name_desc">Product name Z - A</option>
                                <option value="price_desc">Price Highest first</option>
                                <option value="price_asc">Price Lowest first</option>
                            </select>
                        </div>
                        <label class="control-label alignL" for="priceFilter">Filter by maximum price:</label>
                        <input type="number" id="priceFilter" placeholder="Enter maximum price"
                            oninput="filterProducts()">


                    </form>
                    <!-- ********************************************* -->
                    <div id="myTab" class="pull-right">
                        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i
                                    class="icon-list"></i></span></a>
                        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i
                                    class="icon-th-large"></i></span></a>
                    </div>
                    <br class="clr" />






                    <div class="tab-content">
                        <?php

// Fonction pour récupérer les produits depuis la base de données
function getProductss($conn) {
    $products = array();
    $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
    $select_products->execute();
    if ($select_products->rowCount() > 0) {
        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $fetch_products;
        }
    }
    return $products;
}

// Récupérer les produits depuis la base de données
$products = getProductss($conn);

// Vérifier s'il y a des produits à afficher
if (!empty($products)) {
    ?>
                        <div class="tab-pane" id="listView">
                            <?php foreach ($products as $product) { ?>

                            <div class="row">

                                <div class="span2">
                                    <img src="../shop_mini_projet/vendeur/uploaded_img/<?= $product['image']; ?>"
                                        alt="" />
                                </div>
                                <div class="span4">
                                    <h3><?= $product['name']; ?></h3>
                                    <hr class="soft" />
                                    <h5><?= $product['name']; ?></h5>
                                    <p><?= $product['description']; ?></p>
                                    <a class="btn btn-small pull-right" href="product_details.php">View
                                        Details</a>
                                    <br class="clr" />
                                </div>
                                <div class="span3 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3>$<?= $product['price']; ?></h3>
                                        <label class="checkbox">
                                            <input type="checkbox" /> Adds product to compare
                                        </label><br />
                                        <button type="submit" class="btn" name="add_to_cart">Add to<i
                                                class="icon-shopping-cart"></i></button>
                                        <a href="#" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                    </form>
                                </div>
                            </div>
                            <hr class="soft" />
                            <?php } ?>
                        </div>

                        <?php
} else {
    echo '<p class="empty">No products added yet!</p>';
}
?>



                        <div class="tab-pane active" id="blockView">
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
                    <div class="pagination">
                        <ul>
                            <li><a href="#">&lsaquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">&rsaquo;</a></li>
                        </ul>
                    </div>
                    <br class="clr" />
                </div>
            </div>
        </div>
    </div>
    <!-- MainBody End ============================= -->
    <!-- Footer ================================================================== -->
    <?php include 'components_client/footer.php'; ?>
    <!-- Container End -->
    </div>
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
            <!-- Contenu du sélecteur de thème -->
        </div>
    </div>
    <span id="themesBtn"></span>

    <script>
    // Fonction de filtrage des produits
    function filterProducts() {
        const priceFilterInput = document.getElementById("priceFilter");
        const priceFilter = parseFloat(priceFilterInput.value);

        const products = document.querySelectorAll(".product");

        products.forEach(product => {
            const price = parseFloat(product.getAttribute("data-price"));
            if (priceFilter && price > priceFilter) {
                product.style.display = "none";
            } else {
                product.style.display = "block";
            }
        });
    }


    sortSelect.addEventListener('change', function() {
        const selectedValue = this.value;
        const products = Array.from(document.querySelectorAll(".product"));

        products.sort(function(a, b) {
            const aValue = a.getAttribute('data-' + selectedValue.split('_')[0]);
            const bValue = b.getAttribute('data-' + selectedValue.split('_')[0]);

            if (selectedValue.endsWith('_asc')) {
                if (aValue < bValue) return -1;
                if (aValue > bValue) return 1;
                return 0;
            } else {
                if (aValue > bValue) return -1;
                if (aValue < bValue) return 1;
                return 0;
            }
        });

        const productList = document.getElementById('productList');
        productList.innerHTML = ''; // Clear existing product list

        products.forEach(function(product) {
            productList.appendChild(product);
        });
    });
    sortSelect.addEventListener('change', function() {
        const selectedValue = this.value;
        const products = Array.from(document.querySelectorAll(".product"));

        products.sort(function(a, b) {
            const aValue = parseFloat(a.getAttribute('data-price'));
            const bValue = parseFloat(b.getAttribute('data-price'));

            if (selectedValue === 'price_desc') {
                return bValue - aValue; // Tri décroissant
            } else if (selectedValue === 'price_asc') {
                return aValue - bValue; // Tri croissant
            } else {
                // Si la valeur sélectionnée n'est pas un tri par prix, retourner 0 (aucun tri)
                return 0;
            }
        });

        const productList = document.getElementById('productList');
        productList.innerHTML = ''; // Effacer la liste de produits existante

        products.forEach(function(product) {
            productList.appendChild(product);
        });
    });
    </script>





</body>

</html>