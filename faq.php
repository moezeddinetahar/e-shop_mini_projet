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
    <div id="mainBody">
        <div class="container">
            <h1>FAQ</h1>
            <hr class="soften" />
            <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h4>
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2"
                                href="#collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse">
                        <div class="accordion-inner">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                            put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                            haven't heard of them accusamus labore sustainable VHS.
                            <br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Nam elementum varius dapibus. Sed hendrerit porta felis at
                            sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam
                            sem, semper fermentum eleifend nec, viverra ac est. Sed
                            ultricies, lectus et vehicula imperdiet, felis tortor vehicula
                            turpis, non fermentum enim est et sapien. Nam justo mi,
                            dignissim a euismod ut, pretium sed leo. Cum sociis natoque
                            penatibus et magnis dis parturient montes, nascetur ridiculus
                            mus. In viverra porta est, consequat elementum metus tristique
                            a. Mauris tempus tellus a metus dapibus faucibus egestas lectus
                            consectetur. Integer libero dolor, luctus non congue vitae,
                            tempus ut neque. Nunc eleifend lorem quis diam pharetra
                            sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu
                            porttitor. In ultricies rhoncus tortor vitae tincidunt.
                            <br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Nam elementum varius dapibus. Sed hendrerit porta felis at
                            sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam
                            sem, semper fermentum eleifend nec, viverra ac est. Sed
                            ultricies, lectus et vehicula imperdiet, felis tortor vehicula
                            turpis, non fermentum enim est et sapien. Nam justo mi,
                            dignissim a euismod ut, pretium sed leo. Cum sociis natoque
                            penatibus et magnis dis parturient montes, nascetur ridiculus
                            mus. In viverra porta est, consequat elementum metus tristique
                            a. Mauris tempus tellus a metus dapibus faucibus egestas lectus
                            consectetur. Integer libero dolor, luctus non congue vitae,
                            tempus ut neque. Nunc eleifend lorem quis diam pharetra
                            sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu
                            porttitor. In ultricies rhoncus tortor vitae tincidunt.
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h4>
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                href="#collapseTwo">
                                Collapsible Group Item #2
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="accordion-body collapse">
                        <div class="accordion-inner">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                            put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                            haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h4>
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2"
                                href="#collapseThree">
                                Collapsible Group Item #3
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse">
                        <div class="accordion-inner">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                            put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                            haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h4>
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2"
                                href="#collapseFour">
                                Collapsible Group Item #4
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="accordion-body collapse">
                        <div class="accordion-inner">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                            put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                            haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h4>
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2"
                                href="#collapseFive">
                                Collapsible Group Item #5
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="accordion-body collapse">
                        <div class="accordion-inner">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                            put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                            haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <h4>
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2"
                                href="#collapseSix">
                                Collapsible Group Item #6
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="accordion-body collapse">
                        <div class="accordion-inner">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                            put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                            haven't heard of them accusamus labore sustainable VHS.
                        </div>
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