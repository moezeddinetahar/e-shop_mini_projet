<?php

include 'vendeur/components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

  $title = $_POST['title'];
  $title = filter_var($title, FILTER_SANITIZE_STRING);
  
  $first_name = $_POST['inputFname1'];
  $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
  
  $last_name = $_POST['inputLnam'];
  $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
  
  $email = $_POST['input_email'];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  
  $password = sha1($_POST['inputPassword1']);
  // Do not filter password
  
  $conf_password = sha1($_POST['inputPassword2']);
  // Do not filter password
  
  // Assuming you have separate fields for day, month, and year for date of birth
  $dob_day = $_POST['dob_day'];
  $dob_month = $_POST['dob_month'];
  $dob_year = $_POST['dob_year'];

  // Concatenate the date of birth into a single string
  $dob = $dob_year . "-" . $dob_month . "-" . $dob_day;

  // Address information
  $address_line1 = $_POST['address'];
  $address_line1 = filter_var($address_line1, FILTER_SANITIZE_STRING);

  $address_line2 = $_POST['address2'];
  $address_line2 = filter_var($address_line2, FILTER_SANITIZE_STRING);

  $city = $_POST['city'];
  $city = filter_var($city, FILTER_SANITIZE_STRING);


  $postcode = $_POST['postcode'];
  $postcode = filter_var($postcode, FILTER_SANITIZE_STRING);

  $country = $_POST['country'];
  $country = filter_var($country, FILTER_SANITIZE_STRING);

  // Additional information
  $additional_info = $_POST['aditionalInfo'];
  $additional_info = filter_var($additional_info, FILTER_SANITIZE_STRING);

  // Phone numbers
  $home_phone = $_POST['phone'];
  $home_phone = filter_var($home_phone, FILTER_SANITIZE_STRING);

  $mobile_phone = $_POST['mobile'];
  $mobile_phone = filter_var($mobile_phone, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'Email already exists!';
   }else{
      if($password != $conf_password){
         $message[] = 'Confirm password not matched!';
      }else{
        $insert_user = $conn->prepare("INSERT INTO `users` (title, first_name, last_name, email, password, dob, address_line1, address_line2, city, postcode, country, additional_info, home_phone, mobile_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_user->execute([$title, $first_name, $last_name, $email, $password, $dob, $address_line1, $address_line2, $city, $postcode, $country, $additional_info, $home_phone, $mobile_phone]);
         $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
         $select_user->execute([$email, $password]);
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
         if($select_user->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
            header('location:index.php');
         }
      }
   }

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
                        <li class="active">Registration</li>
                    </ul>
                    <h3>Registration</h3>
                    <div class="well">
                        <!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
                        <form class="form-horizontal" method="post">
                            <h4>Your personal information</h4>
                            <div class="control-group">
                                <label class="control-label">Title <sup>*</sup></label>
                                <div class="controls">
                                    <select class="span1" name="title">
                                        <option value="">-</option>
                                        <option value="1">Mr.</option>
                                        <option value="2">Mrs</option>
                                        <option value="3">Miss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputFname1">First name
                                    <sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="inputFname1" placeholder="First Name" name="inputFname1" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputLnam">Last name <sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="inputLnam" placeholder="Last Name" name="inputLnam" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input_email">Email <sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="input_email" placeholder="Email" name="input_email" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
                                <div class="controls">
                                    <input type="password" id="inputPassword1" placeholder="Password"
                                        name="inputPassword1" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword1">Confirm Password
                                    <sup>*</sup></label>
                                <div class="controls">
                                    <input type="password" id="inputPassword2" name="inputPassword2"
                                        placeholder="Confirm Password" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Date of Birth <sup>*</sup></label>
                                <div class="controls">
                                    <select class="span1" name="dob_day">
                                        <option value="">Day</option>
                                        <?php
    // Ajoutez les options pour les jours de 1 à 31
    for ($i = 1; $i <= 31; $i++) {
        echo '<option value="' . $i . '">' . $i . '</option>';
    }
    ?>
                                    </select>

                                    <!-- Menu déroulant pour les mois -->
                                    <select class="span1" name="dob_month">
                                        <option value="">Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>

                                    <!-- Menu déroulant pour les années -->
                                    <select class="span1" name="dob_year">
                                        <option value="">Year</option>
                                        <?php
    // Ajoutez les options pour les années de 1900 à 2024 (ou toute autre année que vous préférez)
    for ($i = 1940; $i <= 2024; $i++) {
        echo '<option value="' . $i . '">' . $i . '</option>';
    }
    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="alert alert-block alert-error fade in">
                                <button type="button" class="close" data-dismiss="alert">
                                    ×
                                </button>
                                <strong>Lorem Ipsum is simply</strong> dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since the 1500s
                            </div>

                            <h4>Your address</h4>

                            <div class="control-group">
                                <label class="control-label" for="address">Address<sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="address" placeholder="Adress" name="address" />
                                    <span>Street address, P.O. box, company name, c/o</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="address2">Address (Line 2)<sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="address2" placeholder="Adress line 2" name="address2" />
                                    <span>Apartment, suite, unit, building, floor, etc.</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="city">City<sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="city" placeholder="city" name="city" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" id="postcode" placeholder="Zip / Postal Code" name="postcode" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="country">Country<sup>*</sup></label>
                                <div class="controls">
                                    <select id="country" name="country">
                                        <option value="">-</option>
                                        <option value="1">Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="aditionalInfo">Additional information</label>
                                <div class="controls">
                                    <textarea name="aditionalInfo" id="aditionalInfo" cols="26" rows="3"
                                        name="aditionalInfo">
Additional information</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="phone">Home phone <sup>*</sup></label>
                                <div class="controls">
                                    <input type="text" name="phone" id="phone" placeholder="phone" name="phone" />
                                    <span>You must register at least one phone number</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="mobile">Mobile Phone
                                </label>
                                <div class="controls">
                                    <input type="text" name="mobile" id="mobile" placeholder="Mobile Phone"
                                        name="mobile" />
                                </div>
                            </div>

                            <p><sup>*</sup>Required field</p>

                            <div class="control-group">
                                <div class="controls">
                                    <input type="hidden" name="email_create" value="1" />
                                    <input type="hidden" name="is_new_customer" value="1" />
                                    <input class="btn btn-large btn-success" type="submit" name="submit"
                                        value="Register" />
                                </div>
                            </div>
                        </form>
                    </div>
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