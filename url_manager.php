<?php

  if (!isset($_SESSION)) 
      session_start();

  if (!$_SESSION['isLoggedIn']) 
    header('Location: index.php');

  include('db_connection.php');

  // --------------------------------------------------------------------------------------------------------

  if ($_POST) { // This POST inserts a new URL on DB.

    $url = mysqli_real_escape_string($db_connection, $_POST['url']);

    $query_insert_url = "INSERT INTO urls (`url`) VALUES ('{$url}')";
    mysqli_query($db_connection, $query_insert_url) or die("ERROR when trying to insert a new url on DB");

  }

?>