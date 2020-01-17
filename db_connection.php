<?php

  // DB config
  define('HOST', '127.0.0.1');
  define('USER', 'root');
  define('PASSWORD', '');
  define('DB', 'url_checker');

  // DB connection instance
  $db_connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die('Failed to connect to the database.');

?>