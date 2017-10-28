<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 28/10/2017
 * Time: 11:40
 */
// Si le formulaire a été soumis
if (isset($_POST['register'])){
    //Si tous les champs ont été remplis
    if (!empty($_POST['name']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordconfirmation'])){

        $errors = []; //Tableau contenant l'ensemble des erreurs

        extract($_POST);

        //Je vérifie que le pseudo fait au moins 3 caracteres
        if (mb_strlen($pseudo) < 3){
            $errors[] = "Pseudo trop court, vous devez saisir un minimum de 3 caractéres";
        }
        //Je vérifie si l'adresse email est valide
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "L'adresse email n'est pas valide!";
        }
        //Je vérifie si le mot de passe n'est pas trop court
        if (mb_strlen($password) < 6){
            $errors[] = "Mot de passe trop court minimum 6 caractéres!";
        } else {
            if ($password == $passwordconfirmation){
                $errors[] = "Les deux mots de passes sont différents!";
            }
        }
        if (is_already_in_use('pseudo', $pseudo, 'users' )){
            $errors[] = "Pseudo déjà utilisé!";
        }
        if (is_already_in_use('email', $email, 'users' )){
            $errors[] = "Adresse E-mail déjà utilisé!";
        }
        if (count($errors) == 0){
           //Envoi d'un mail d'activation
          //Informer l'utilisateur pour qu'il vérifie sa boite de reception
        }

    } else {
        $errors[] = "Veuillez SVP remplir tout les champs!";
    }
}

require 'views/inscription.php';