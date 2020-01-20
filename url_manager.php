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

  } else { // This GET lists all the URLs from DB.

    $query_get_urls = "SELECT * FROM urls";
    $allUrls = mysqli_query($db_connection, $query_get_urls) or die("ERROR when trying to get urls from DB");

    $urlsArray = array();
    
    while($row = mysqli_fetch_assoc($allUrls)) {
      $urlsArray[] = $row;
    }
    
    echo json_encode($urlsArray);
  }

?>