<?php

include 'connect.php';

// Routes
$templates_path = 'includes/templates/';
$admin_css_path = 'layouts/css/';
$js_path = 'layouts/js/';
$images_path = 'layouts/images/';
$packages_path = '../node_modules/';
$functions_path = 'includes/functions/';

include $functions_path . 'functions.php';

include $templates_path . 'header.php';
if (!isset($noNavbar)) include $templates_path . 'navbar.php';
