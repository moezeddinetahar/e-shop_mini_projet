<?php

include 'vendeur/components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:index.php');
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      if($address == ''){
         $message[] = 'please add your address!';
      }else{
         
         $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
         $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

         $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
         $delete_cart->execute([$user_id]);

         $message[] = 'order placed successfully!';
      }
      
   }else{
      $message[] = 'your cart is empty';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

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
<style>
.checkout form {
    max-width: 40rem;
    margin: 0 auto;
    border: var(--border);
    padding: 2rem;
}

.checkout form h3 {
    font-size: 1rem;
    text-transform: capitalize;
    padding: 1rem 0;
    color: var(--black);
}

.checkout form .cart-items {
    background-color: var(--black);
    padding: 2rem;
    padding-top: 0;
}

.checkout form .cart-items h3 {
    color: var(--white);
}

.checkout form .cart-items p {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    justify-content: space-between;
    margin: 1rem 0;
    line-height: 1.5;
    font-size: 2rem;
}

.checkout form .cart-items p .name {
    color: var(--light-color);
}

.checkout form .cart-items p .price {
    color: var(--yellow);
}

.checkout form .cart-items .grand-total {
    background-color: var(--white);
    padding: .5rem 1.5rem;
}

.checkout form .cart-items .grand-total .price {
    color: var(--red);
}

.checkout form .user-info p {
    font-size: 1rem;
    line-height: 0;
    padding: 1rem 0;
}

.checkout form .user-info p i {
    color: var(--light-color);
    margin-right: 1rem;
}

.checkout form .user-info p span {
    color: var(--black);
}

.checkout form .user-info .box {
    width: 100%;
    border: var(--border);
    padding: -0.5rem;
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-size: 1rem;
}
</style>

<body>

    <!-- header section starts  -->
    <?php include 'components_client/header.php'; ?>
    <!-- header section ends -->

    <div class="heading">
        <h3>checkout</h3>
        <p><a href="home.php">home</a> <span> / checkout</span></p>
    </div>

    <section class="checkout">

        <h1 class="title">order summary</h1>

        <form action="" method="post">

            <div class="cart-items">
                <h3>cart items</h3>
                <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
                <p><span class="name"><?= $fetch_cart['name']; ?></span><span
                        class="price">$<?= $fetch_cart['price']; ?> x <?= $fetch_cart['quantity']; ?></span></p>
                <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
                <p class="grand-total"><span class="name">grand total :</span><span
                        class="price">$<?= $grand_total; ?></span></p>
                <a href="product_summary.php" class="btn">veiw cart</a>
            </div>

            <input type="hidden" name="total_products" value="<?= $total_products; ?>">
            <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
            <input type="hidden" name="name" value="<?= $fetch_profile['first_name'] ?>">
            <input type="hidden" name="number" value="<?= $fetch_profile['mobile_phone'] ?>">
            <input type="hidden" name="email" value="<?= $fetch_profile['email'] ?>">
            <input type="hidden" name="address" value="<?= $fetch_profile['address_line1'] ?>">

            <div class="user-info">
                <h3>your info</h3>
                <p><i class="fas fa-user"></i><span><?= $fetch_profile['first_name'] ?></span></p>
                <p><i class="fas fa-phone"></i><span><?= $fetch_profile['mobile_phone'] ?></span></p>
                <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email'] ?></span></p>
                <a href="update_profile.php" class="btn">update info</a>
                <h3>delivery address</h3>
                <p><i
                        class="fas fa-map-marker-alt"></i><span><?php if($fetch_profile['address_line1'] == ''){echo 'please enter your address';}else{echo $fetch_profile['address_line1'];} ?></span>
                </p>
                <a href="update_address.php" class="btn">update address</a>
                <select name="method" class="box" required>
                    <option value="" disabled selected>select payment method --</option>
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paytm">paytm</option>
                    <option value="paypal">paypal</option>
                </select>
                <input type="submit" value="place order"
                    class="btn <?php if($fetch_profile['address_line2'] == ''){echo 'disabled';} ?>"
                    style="width:100%; background:var(--red); color:var(--white);" name="submit">
            </div>

        </form>

    </section>









    <!-- footer section starts  -->
    <?php include 'components_client/footer.php'; ?>
    <!-- footer section ends -->






    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>