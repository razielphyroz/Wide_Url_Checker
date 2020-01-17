<?php

  if (!isset($_SESSION)) 
    session_start();

  // Avoids users to access pages without be logged in.
  if (!$_SESSION['username']) {
    header('Location: index.php');
    exit();
  }

?>