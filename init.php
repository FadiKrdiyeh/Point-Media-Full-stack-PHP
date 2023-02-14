<?php

// include 'connect.php';

// Routes
$templates_path = 'includes/templates/';
$css_path = 'layouts/css/';
$js_path = 'layouts/js/';
$images_path = 'layouts/images/';
$langs_path = 'includes/langs/';
$packages_path = 'node_modules/';
$functions_path = 'includes/functions/';

include $functions_path . 'functions.php';

// Store Language In Cookies
if (!empty($_GET['language'])) {
  $_COOKIE['language'] = $_GET['language'] === 'en' ? 'en' : 'ar';
  setcookie('language', $_COOKIE['language']);
}

// Check If There Is Language Cookies To Import Related File, Else Import Arabic As Default
if ($_COOKIE['language'] == "en") {
  // include("en.php");
  include $langs_path . 'en.php';
} else {
  // include("ar.php");
  include $langs_path . 'ar.php';
}

include $templates_path . 'header.php';
