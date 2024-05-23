<!-- Sidebar ================================================== -->

<?php
// Calcul du nombre total d'articles dans le panier
$total_items = 0;
$select_cart = $conn->prepare("SELECT SUM(quantity) AS total_items FROM `cart` WHERE user_id = ?");
$select_cart->execute([$user_id]);
$row = $select_cart->fetch(PDO::FETCH_ASSOC);
if ($row['total_items']) {
    $total_items = $row['total_items'];
}
?>

<div id="sidebar" class="span3">
    <div class="well well-small">
        <a id="myCart" href="./product_summary.php">
            <img src="themes/images/ico-cart.png" alt="cart" />
            <?= $total_items; ?> Items in your cart
            <?php
            $grand_total = 0;
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if ($select_cart->rowCount() > 0) {
                while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                    $grand_total += $fetch_cart['price'] * $fetch_cart['quantity'];
                }
            }
            ?>
            <span class="badge badge-warning pull-right">$<?= $grand_total; ?></span>
        </a>
    </div>






    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        <li class="subMenu open">
            <a> ELECTRONICS</a>
            <ul>
                <li>
                    <a class="active" href="category.php?category=Cameras"><i class="icon-chevron-right"></i>Cameras
                    </a>
                </li>
                <li>
                    <a href="category.php?category=Computers"> <i class="icon-chevron-right"></i>Computers</a>
                </li>
                <li>
                    <a href="category.php?category=Mobile Phone"><i class="icon-chevron-right"></i>Mobile Phone</a>
                </li>
                <li>
                    <a href="category.php?category=Sound & Vision"><i class="icon-chevron-right"></i>Sound &
                        Vision</a>
                </li>
            </ul>
        </li>
        <li class="subMenu">
            <a> CLOTHES [840] <br>[Not available for the moment ! ]</a>
            <ul style="display: none">
                <li>
                    <a href="./special_offer.php"><i class="icon-chevron-right"></i>Women's Clothing
                        (45)</a>
                </li>
                <li>
                    <a href="./special_offer.php"><i class="icon-chevron-right"></i>Women's Shoes (8)</a>
                </li>
                <li>
                    <a href="./special_offer.php"><i class="icon-chevron-right"></i>Women's Hand Bags
                        (5)</a>
                </li>
                <li>
                    <a href="./special_offer.php"><i class="icon-chevron-right"></i>Men's Clothings (45)</a>
                </li>
                <li>
                    <a href="./special_offer.php"><i class="icon-chevron-right"></i>Men's Shoes (6)</a>
                </li>
                <li>
                    <a href="./special_offer.php"><i class="icon-chevron-right"></i>Kids Clothing (5)</a>
                </li>
                <li>
                    <a href="./special_offer.php"><i class="icon-chevron-right"></i>Kids Shoes (3)</a>
                </li>
            </ul>
        </li>
        <li class="subMenu">
            <a>FOOD AND BEVERAGES <br> [Not available for the moment ! ]</a>
        </li>
        <li><a href="./special_offer.php">HEALTH & BEAUTY <br>[Not available for the moment ! ]</a></li>
        <li><a href="./special_offer.php">SPORTS & LEISURE <br>[Not available for the moment ! ]</a></li>
        <li><a href="./special_offer.php">BOOKS & ENTERTAINMENTS <br> [Not available for the moment ! ]</a></li>
    </ul>
    <br />
    <div class="thumbnail">
        <img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera" />
        <div class="caption">
            <h5>Panasonic</h5>
            <h4 style="text-align: center">
                <a class="btn" href="product_details.php">
                    <i class="icon-zoom-in"></i></a>
                <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                <a class="btn btn-primary" href="#">$222.00</a>
            </h4>
        </div>
    </div>
    <br />
    <div class="thumbnail">
        <img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel" />
        <div class="caption">
            <h5>Kindle</h5>
            <h4 style="text-align: center">
                <a class="btn" href="product_details.php">
                    <i class="icon-zoom-in"></i></a>
                <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                <a class="btn btn-primary" href="#">$222.00</a>
            </h4>
        </div>
    </div>
    <br />
    <div class="thumbnail">
        <img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods" />
        <div class="caption">
            <h5>Payment Methods</h5>
        </div>
    </div>
</div>
<!-- Sidebar end=============================================== -->