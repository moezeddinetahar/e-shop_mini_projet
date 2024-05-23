<?php

include 'vendeur/components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:index.php');
};

if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
   $message[] = 'cart item deleted!';
}

if(isset($_POST['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   // header('location:cart.php');
   $message[] = 'deleted all from cart!';
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'cart quantity updated';
}

$grand_total = 0;

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

    <div id="mainBody">
        <div class="container">
            <div class="row">
                <?php include 'components_client/sidebar.php'; ?>
                <div class="span9">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a> <span class="divider">/</span>
                        </li>
                        <li class="active">SHOPPING CART</li>
                    </ul>
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

                    <h3>
                        SHOPPING CART [ <small><?= $total_items; ?> Item(s) </small>]<a href="index.php"
                            class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping
                        </a>
                    </h3>

                    <hr class="soft" />
                    <!-- <table class="table table-bordered">
                        <tr>
                            <th>I AM ALREADY REGISTERED</th>
                        </tr>
                        <tr>
                            <td>
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputUsername">Username</label>
                                        <div class="controls">
                                            <input type="text" id="inputUsername" placeholder="Username" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword1">Password</label>
                                        <div class="controls">
                                            <input type="password" id="inputPassword1" placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Sign in</button> OR
                                            <a href="register.html" class="btn">Register Now!</a>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <a href="forgetpass.html" style="text-decoration: underline">Forgot password
                                                ?</a>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </table> -->

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Quantity/Update</th>
                                <th>Price</th>
                                <th>Tax</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
$grand_total = 0;
$tax_total = 0; // Variable pour calculer la taxe totale
$select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
$select_cart->execute([$user_id]);
if ($select_cart->rowCount() > 0) {
    while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
        $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
        $grand_total += $sub_total;
        // Calcul de la taxe pour chaque produit en fonction de la quantité
        $tax = ($fetch_cart['price'] * 0.18) * $fetch_cart['quantity']; // 18% du prix multiplié par la quantité
        $tax_total += $tax; // Ajout à la taxe totale
?>
                            <tr>
                                <td>
                                    <img width="60"
                                        src="http://localhost/mini-projet/v.1/dev%20html/shop_mini_projet/vendeur/uploaded_img/<?= $fetch_cart['image']; ?>"
                                        alt="" />
                                </td>
                                <td><?= $fetch_cart['name']; ?></td>
                                <td>
                                    <div class="input-append">
                                        <form action="" method="post">
                                            <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                                            <input class="span1" style="max-width: 34px" placeholder="1"
                                                id="appendedInputButtons" size="16" type="text" name="qty"
                                                value="<?= $fetch_cart['quantity']; ?>" maxlength="2" />
                                            <button class="btn" type="submit" name="update_qty"><i
                                                    class="icon-refresh"></i></button>
                                            <button class="btn btn-danger" type="submit" name="delete"
                                                onclick="return confirm('delete this item?');"><i
                                                    class="icon-remove icon-white"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>$<?= $fetch_cart['price']; ?></td>
                                <td>$<?= number_format($tax, 2); ?></td> <!-- Affichage de la taxe pour ce produit -->
                                <td>$<?= $sub_total; ?></td>
                            </tr>
                            <?php
    }
} else {
    echo '<tr><td colspan="6" style="text-align:center">Your cart is empty</td></tr>';
}
?>

                            <tr>
                                <td colspan="5" style="text-align: right">Total Price:</td>
                                <td colspan="2">$<?= $grand_total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right">Total Tax:</td>
                                <td>$<?= number_format($tax_total, 2); ?></td> <!-- Affichage de la taxe totale -->
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right">
                                    <strong>TOTAL ($<?= $grand_total; ?>) =</strong>
                                </td>
                                <td class="label label-important" style="display: block">
                                    <strong>$<?= $grand_total; ?></strong>
                                </td>
                            </tr>

                        </tbody>
                    </table>



                    <!-- <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <form class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label"><strong> VOUCHERS CODE: </strong>
                                            </label>
                                            <div class="controls">
                                                <input type="text" class="input-medium" placeholder="CODE" />
                                                <button type="submit" class="btn">ADD</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <tr>
                            <th>ESTIMATE YOUR SHIPPING</th>
                        </tr>
                        <tr>
                            <td>
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputCountry">Country
                                        </label>
                                        <div class="controls">
                                            <input type="text" id="inputCountry" placeholder="Country" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPost">Post Code/ Zipcode
                                        </label>
                                        <div class="controls">
                                            <input type="text" id="inputPost" placeholder="Postcode" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">ESTIMATE</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr> 
                    </table>-->
                    <a href="./index.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping
                    </a>
                    <a href="checkout.php"
                        class="btn btn-large pull-right <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to
                        checkout<i class="icon-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- MainBody End ============================= -->
    <?php include 'components_client/footer.php'; ?>
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