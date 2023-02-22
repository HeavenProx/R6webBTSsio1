<?php 
    require 'config.php';

    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])) 
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        //verifier si la personne est inscrite
        $check = $bdd->prepare('SELECT pseudo, email, password FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetchAll();

        //verifie si il existe dans la table et renvoie qqchose
        $row = $check->rowCount();

        if($row == 0)
        {
            //verif de la taille du pseudo et de l'email
            if(strlen($pseudo) <= 100)
            {
                if(strlen($email) <= 100)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if($password === $password_retype)
                        {
                            $password = password_hash($password, PASSWORD_DEFAULT);

                            //insertion dans la bdd
                            $insert = $bdd->prepare('INSERT INTO user(pseudo, email, password) VALUES(:pseudo, :email, :password)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password
                            ));
                            header('Location:inscription.php?reg_err=success');
                        }else header('Location:inscription.php?reg_err=password');
                    }else header('Location:inscription.php?reg_err=email');
                }else header('Location:inscription.php?reg_err=email_length');
            }else header('Location:inscription.php?reg_err=pseudo_length');
        }else header('Location:inscription.php?reg_err=already');
    }