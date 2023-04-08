<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Zoo</title>
  </head>
  <body>
    <main>
      <h1>Zoo</h1>
      <form action="login.php" method="post">
        <div class="input_top">
          <img
            src="img/img_for_input/anonyme.jpg"
            alt=""
            class="input_login"
          />
          <input type="text" class="login" name="login" placeholder="Login" required />
        </div>
        <div class="input_bottom">
          <img
            src="img/img_for_input/lock.png"
            alt=""
            class="input_password"
          />
          <input
            type="password"
            class="password"
            placeholder="Password"
            name="password"
            required
          />
        </div>
        <?php

        if(isset($_SESSION['badconnecte'])){
            echo '<h2>Login ou mot de passe incorrects</h2>';
            unset($_SESSION['badconnecte']);
        }
        ?>
        <button>Login</button>
        <p>Pas encore inscrit ?</p>
        <a href="page_inscription/index.php" class="sign_up">Inscrivez vous.</a>
      </form>
    </main>
  </body>
</html>
