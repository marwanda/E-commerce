<?php

include "../include/config.php";

$path = '../';

if($_SESSION['lang']=='en')
$_SESSION['lang']='ar';
else
    $_SESSION['lang']='en';

redirect('home',$path);