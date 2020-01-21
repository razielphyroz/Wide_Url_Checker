<?php

    if (!isset($_SESSION)) 
        session_start();

    if (!$_SESSION['isLoggedIn']) 
        header('Location: index.php');

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <title>Wide Url Checker</title>
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <script src="js/painel.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <a class="button is-block is-danger" href="logout.php">Logout</a>
    <a class="button is-block is-warning" onclick="refreshButton()">Refresh</a>
   
    <section class="hero is-success is-fullheight">
        <div class="container has-text-centered">
            <div class="column is-6 is-offset-3">
                <h3 class="title has-text-grey">Insert a new URL</h3>
                <div class="box has-text-centered">
                    <div class="field">
                        <div class="control has-text-centered">
                            <input id="url" class="input is-large" type="text" placeholder="New URL">
                        </div>
                    </div>
                    <button onclick="submitUrl()" class="button is-block is-link is-large centered" >Submit</button>
                </div>
                <div id="errorBox" class="notification is-danger">
                  <p>ERROR: Wrong Url Format.</p>
                </div>
                <div id="successBox" class="notification is-success">
                  <p>SUCCESS: URL inserted!</p>
                </div>
                <div id="refreshedBox" class="notification is-warning">
                  <p>REFRESH: URL list refreshed!</p>
                </div>
                <div id="urlsBox">
                </div>
                <div id="urlBoxModel" class="box hidden">
                    <div class="box-header">
                        <div class="url-name has-text-grey"></div>
                        <div class="url-status has-text-grey"></div>
                    </div>
                    <textarea class="url-body" readonly disabled></textarea>
                </div>
            </div>
        </div>
    </section>
</body>

</html>