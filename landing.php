<?php 
    session_start();
    if(isset($_SESSION['pseudo']))
    {
        header('Location:index.php');
    }
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>landing</title>
        </head>
        <body>
            <h1>Bonjour  <?php echo $_SESSION['user']; ?> !</h1>
            <a href="deconnection.php" class="btn btn--danger btn-lg">Deconnection</a>
        </body>
    </html>
