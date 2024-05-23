<?php

include 'vendeur/components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>profile</title>
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
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<style>
.user-details .user {
    max-width: 50rem;
    margin: 0 auto;
    border: var(--border);
    padding: 2rem;
}

.user-details .user img {
    width: 100%;
    height: 20rem;
    object-fit: contain;
    margin-bottom: 1rem;
}

.user-details .user p {
    padding: 1rem 0;
    line-height: 1.5;
    font-size: 2rem;
}

.user-details .user p span {
    color: var(--black);
}

.user-details .user p i {
    margin-right: 1rem;
    color: var(--light-color);
}

.user-details .user .address {
    margin-top: 1rem;
}
</style>

<body>

    <!-- header section starts  -->
    <?php include 'components_client/header.php'; ?>
    <!-- header section ends -->

    <section class="user-details">

        <div class="user">
            <?php
         
      ?>
            <img src="images/user-icon.png" alt="">
            <p><i class="fas fa-user"></i><span><span><?= $fetch_profile['first_name']; ?></span></span></p>
            <p><i class="fas fa-user"></i><span><span><?= $fetch_profile['last_name']; ?></span></span></p>
            <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']; ?></span></p>

            <p><i class="fas fa-phone"></i><span><?= $fetch_profile['mobile_phone']; ?></span></p>
            <a href="update_profile.php" class="btn">update info</a>
            <p class="address"><i
                    class="fas fa-map-marker-alt"></i><span><?php if($fetch_profile['address_line1'] == ''){echo 'please enter your address';}else{echo $fetch_profile['address_line2'];} ?></span>
            </p>
            <a href="update_address.php" class="btn">update address</a>
        </div>

    </section>










    <?php include 'components_client/footer.php'; ?>







    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>