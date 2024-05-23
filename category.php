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

<head>
    <meta charset="utf-8" />
    <title>checkout</title>
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


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>

<body>

    <?php include 'components_client/header.php'; ?>
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <?php include 'components_client/sidebar.php'; ?>
                <div class="span9">
                    <section class="products">

                        <h1 class="title">ELECTRONICS category</h1>

                        <div class="box-container">

                            <?php
         $category = $_GET['category'];
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = ?");
         $select_products->execute([$category]);
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
                            <form action="" method="post" class="box">
                                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                                <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                                <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                                <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                                <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                                <img src="../shop_mini_projet/vendeur/uploaded_img/<?= $fetch_products['image']; ?>"
                                    alt="">
                                <div class="name"><?= $fetch_products['name']; ?></div>
                                <div class="flex">
                                    <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                                    <input type="number" name="qty" class="qty" min="1" max="99" value="1"
                                        maxlength="2">
                                </div>
                            </form>
                            <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

                        </div>

                    </section>
                </div>

            </div>
        </div>

















        <?php include 'components_client/footer.php'; ?>

        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/script.js"></script>


</body>

</html>