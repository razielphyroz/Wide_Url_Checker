<?php
  
    if (!isset($_SESSION)) 
        session_start();

    // Blocks the access to the loggin page if the user has already logged in
    if (isset($_SESSION['isLoggedIn']))
        header('Location: painel.php');

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <title>Wide Url Checker</title>
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Wide Url Checker</h3>
                    <?php
                        if (isset($_SESSION['wrong_credentials'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERROR: Wrong e-mail or password.</p>
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['wrong_credentials']);
                    ?>
                    <div class="box">
                        <form action="login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="username" class="input is-large" type="text" placeholder="Username">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="password" class="input is-large" type="password" placeholder="Password">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>