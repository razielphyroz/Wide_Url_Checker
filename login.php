<?php

  if (!isset($_SESSION)) 
    session_start();
  
  include('db_connection.php');

  // Redirects the user to the LoginPage if the username or password wasn't informed.
  if (empty($_POST['username']) || empty($_POST['password'])) {
    header('Location: index.php');
    exit();
  }

  // The "ScapeString" avoids SQL injection.
  $username = mysqli_real_escape_string($db_connection, $_POST['username']);
  $password = mysqli_real_escape_string($db_connection, $_POST['password']);

  $query_search_user = "SELECT user_id, username FROM users WHERE username = '{$username}' AND password = md5('{$password}')";

  $result = mysqli_query($db_connection, $query_search_user);

  $is_valid_credentials = mysqli_num_rows($result) >= 1 ? true : false;

  if ($is_valid_credentials) {
    $_SESSION['username'] = $username;
    $_SESSION['isLoggedIn'] = true;
    header('Location: painel.php');
  } else {
    $_SESSION['wrong_credentials'] = true;
    header('Location: index.php');
  }

  exit();

?>