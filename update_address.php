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

   $address = $_POST['flat'] .', '.$_POST['building'].', '.$_POST['area'].', '.$_POST['town'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'address saved!';

}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<style>
.form-container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

.form-container form {
    background-color: var(--white);
    border-radius: .5rem;
    border: var(--border);
    box-shadow: var(--box-shadow);
    padding: 0rem;
    text-align: center;
    width: 30rem;
}

.form-container form h3 {
    font-size: 1.5rem;
    color: var(--black);
    text-transform: capitalize;
    margin-bottom: 1rem;
}

.form-container form p {
    margin: 1rem 0;
    font-size: 1rem;
    color: var(--light-color);
}

.form-container form p span {
    color: var(--main-color);
}

.form-container form .box {
    width: 80%;
    background-color: var(--light-bg);
    padding: 0.7rem;
    font-size: 1.4rem;
    color: var(--black);
    /* margin: 1rem 0; */
    border: var(--border);
    font-size: 1.8rem;
    border-radius: .5rem;
}
</style>

<body>

    <?php include 'components_client/header.php'; ?>
    <section class="form-container">

        <form action="" method="post">
            <h3>your address</h3>
            <input type="text" class="box" placeholder="flat no." required maxlength="50" name="flat">
            <input type="text" class="box" placeholder="building no." required maxlength="50" name="building">
            <input type="text" class="box" placeholder="area name" required maxlength="50" name="area">
            <input type="text" class="box" placeholder="town name" required maxlength="50" name="town">
            <input type="text" class="box" placeholder="city name" required maxlength="50" name="city">
            <input type="text" class="box" placeholder="state name" required maxlength="50" name="state">
            <input type="text" class="box" placeholder="country name" required maxlength="50" name="country">
            <input type="number" class="box" placeholder="pin code" required max="999999" min="0" maxlength="6"
                name="pin_code">
            <input type="submit" value="save address" name="submit" class="btn">
        </form>

    </section>










    <?php include 'components_client/footer.php'; ?>






    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>