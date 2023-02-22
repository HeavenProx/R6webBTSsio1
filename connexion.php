<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Connexion</title>
  </head>
  <body>

    <?php include "menu.php" ?> 

    <div class="login-form">
      <?php 
      
        if(isset($_GET['login_err']))
        {       
            $err = htmlspecialchars($_GET['login_err']);

            switch($err)
            {
                case 'success':
                    ?>
                        <div class="alert alert-success">
                            <strong>Succès</strong> Connexion réussie !
                        </div>
                    <?php
                break;

                case 'password':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> mot de passe incorrect
                    </div>
                <?php
                break;

                case 'email':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> email incorrect
                    </div>
                <?php
                break;

                case 'already':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> compte non existant
                    </div>
                <?php
                break;
            }
        }
      ?> 

  </br>
    <div class="center">

        <form class="form" action="connexion_traitement.php" method="POST">
            <h2 class="text-center">Connexion</h2>       
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
            </div>   
            <p class="text-center"><a href="inscription.php">Inscription</a></p>
        </form>
    </div>

    </body>

   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>