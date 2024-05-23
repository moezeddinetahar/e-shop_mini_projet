<?php

include 'connect.php';

session_start();
session_unset();
session_destroy();

header('location:../../../shop_mini_projet/index.php');

?>