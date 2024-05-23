<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<style>
:root {
    --yellow: #fed330;
    --red: #e74c3c;
    --white: #fff;
    --black: #222;
    --light-color: #777;
    --border: .2rem solid var(--black);
}

.header .flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}

.header .flex .logo {
    font-size: 2.5rem;
    color: var(--black);
}

.header .flex .navbar a {
    font-size: 2rem;
    color: var(--black);
    margin: 0 1rem;
}

.header .flex .navbar a:hover {
    color: var(--white);
    text-decoration: underline;
}

.header .flex .icons>* {
    margin-left: 1.5rem;
    font-size: 2.5rem;
    color: var(--border);

    cursor: pointer;
}

.header .flex .icons>*:hover {
    color: var(--white);

}

.header .flex .icons span {
    font-size: 2rem;
}

#menu-btn {
    display: none;
}

.header .flex .profile {
    background-color: var(--white);
    border: var(--border);
    padding: 1.5rem;
    text-align: center;
    position: absolute;
    top: 125%;
    right: 2rem;
    width: 30rem;
    display: none;
    animation: fadeIn .2s linear;

}

.header .flex .profile.active {

    display: inline-block;
    position: absolute;
    z-index: 1000;
}

@keyframes fadeIn {
    0% {
        transform: translateY(1rem);
    }
}

.header .flex .profile .name {
    font-size: 2rem;
    color: var(--black);
    margin-bottom: .5rem;
}

.header .flex .profile .account {
    margin-top: 1.5rem;
    font-size: 2rem;
    color: var(--light-color);
}

.header .flex .profile .account a {
    color: var(--black);
}

.header .flex .profile .account a:hover {
    color: var(--yellow);
    text-decoration: underline;

}

.brand {
    width: 7%;
}
</style>



<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">


            <div class="span6">Welcome!<strong> user</strong></div>
            <div class="span6">
                <div class="pull-right">
                    <!-- <a href="product_summary.php"><span class="">Fr</span></a>
                    <a href="product_summary.php"><span class="">Es</span></a>
                    <span class="btn btn-mini">En</span>
                    <a href="product_summary.php"><span>&pound;</span></a>
                    <span class="btn btn-mini">$155.00</span> -->


                    <?php
$count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
$count_cart_items->execute([$user_id]);
$total_cart_items = $count_cart_items->rowCount();
?>


                    <a href="./product_summary.php"><span class="btn btn-mini btn-primary"><i
                                class="icon-shopping-cart icon-white"></i> <span>(<?= $total_cart_items; ?>)</span>
                            Itemes in
                            your cart
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop" /></a>
                <form class="form-inline navbar-search" method="post" action="products.php">
                    <input id="srchFld" class="srchTxt" type="text" />
                    <select class="srchTxt">
                        <option>All</option>
                        <option>CLOTHES</option>
                        <option>FOOD AND BEVERAGES</option>
                        <option>HEALTH & BEAUTY</option>
                        <option>SPORTS & LEISURE</option>
                        <option>BOOKS & ENTERTAINMENTS</option>
                    </select>
                    <button type="submit" id="submitButton" class="btn btn-primary">
                        Go
                    </button>
                </form>
                <ul id="topMenu" class="nav pull-right">
                    <li class=""><a href="./special_offer.php">Products</a></li>
                    <li class=""><a href="normal.php">Delivery</a></li>
                    <li class=""><a href="contact.php">Contact</a></li>
                    <!-- <li class="">
                        <a href="#login" role="button" data-toggle="modal" style="padding-right: 0"><span
                                class="btn btn-large btn-success">Login</span></a>
                        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login"
                            aria-hidden="false">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    ×
                                </button>
                                <h3>Login Block</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal loginFrm">
                                    <div class="control-group">
                                        <input type="text" id="inputEmail" placeholder="Email" />
                                    </div>
                                    <div class="control-group">
                                        <input type="password" id="inputPassword" placeholder="Password" />
                                    </div>
                                    <div class="control-group">
                                        <label class="checkbox">
                                            <input type="checkbox" /> Remember me
                                        </label>
                                    </div>
                                </form>
                                <button type="submit" class="btn btn-success">
                                    Sign in
                                </button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">
                                    Close
                                </button>
                            </div>
                        </div>
                    </li> -->
                    <li>
                        <div class="header">
                            <section class="flex">
                                <div class="icons">
                                    <div id="user-btn" class="fas fa-user"></div>
                                    <div id="menu-btn" class="fas fa-bars"></div>
                                </div>

                                <div class="profile">
                                    <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
                                    <p class="name"><?= $fetch_profile['first_name']; ?></p>
                                    <div class="flex">
                                        <a href="profile.php" class="btn">profile</a>
                                        <a href="vendeur/components/user_logout.php"
                                            onclick="return confirm('logout from this website?');"
                                            class="delete-btn">logout</a>
                                    </div>

                                    <?php
}else{
?>
                                    <p class="name">please login first!</p>
                                    <a href="login.php" class="btn">login</a>
                                    <a href="register.php" class="btn">register</a>
                                    <?php
}
?>
                                </div>
                            </section>
                        </div>



                    </li>
                </ul>
            </div>

        </div>

    </div>

</div>
<!-- Header End====================================================================== -->


</section>

</div>
<script>
navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    profile.classList.remove('active');
}

profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () => {
    profile.classList.toggle('active');
    navbar.classList.remove('active');
}
</script>

</html>