<?php

    require 'config.php';
    //verifier si l'email et le password sont bien rentrer
    if(isset($_POST['email']) && isset($_POST['password']))
    {

        //empecher les injections sql
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        //verifier si la personne est inscrite
        $check = $bdd->prepare('SELECT pseudo, email, password FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        //verifie si il existe dans la table et renvoie qqchose
        $row = $check->rowCount();
        
        if($row == 1)
        {
            //verifier que l'email est valide
            if($email == $data['email'])
            {
                //hash du password 
                /*$password = $_POST['password'];*/
                $_hashtest = trim($data['password']);
                var_dump(password_verify($password,  $_hashtest));
                if(password_verify($password,  $_hashtest))
                {
                    //demarrer une session et rediriger
                    $_SESSION['email'] = $data['email'];
                    header('Location:connexion.php?reg_err=success');
                } 

            }else header('Location:connexion.php?login_err=email');

        }else header('Location:connexion.php?login_err=already');

    }else header('Location:connexion.php');

?>
