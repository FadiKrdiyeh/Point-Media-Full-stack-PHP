<?php

$dsn = 'mysql:host=localhost;dbname=point_media_db';
$user = 'root';
$pass = '';
$option = array(
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $con = new PDO($dsn, $user, $pass, $option);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'Connected To DB';
} catch (PDOException $e) {
  echo '<div class="container"><div class="alert alert-danger text-center mt-5">Failed To Connect to DB <br />' . $e->getMessage() . '</div></div>';
}
