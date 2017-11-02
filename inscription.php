<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 28/10/2017
 * Time: 11:40
 */
session_start();
require 'includes/functions.php';
require 'config/database.php';
require 'includes/constants.php';
// Si le formulaire a été soumis
if (isset($_POST['register'])){

    //Si tous les champs ont été remplis
    if (!empty([$_POST['name'], $_POST['pseudo'], $_POST['Email'], $_POST['password'], $_POST['passwordconfirmation']])) {

        $errors = []; //Tableau contenant l'ensemble des erreurs


        //Je vérifie que le pseudo fait au moins 3 caracteres
        if (mb_strlen($_POST['pseudo']) < 3) {
            $errors[] = "Pseudo trop court, vous devez saisir un minimum de 3 caractéres";
        }
        //Je vérifie si l'adresse email est valide
        if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email n'est pas valide!";
        }
        //Je vérifie si le mot de passe n'est pas trop court
        if (mb_strlen($_POST['password']) < 6) {
            $errors[] = "Mot de passe trop court minimum 6 caractéres!";
        } else {
            if ($_POST['password'] != $_POST['passwordconfirmation']) {
                $errors[] = "Les deux mots de passes sont différents!";

            }
        }
        /*if (is_already_in_use('pseudo', $_POST['pseudo'], 'users')) {
            $errors[] = "Pseudo déjà utilisé!";
        }
        if (is_already_in_use('email', $_POST['Email'], 'users')) {
            $errors[] = "Adresse E-mail déjà utilisé!";
        }*/

        if (count($errors) === 0) {
            //Envoi d'un mail d'activation
            $to = $_POST['Email'];
            $subject = "Social Codeur - Activation de compte";
            $token = sha1($_POST['pseudo'] . $_POST['Email'] . $_POST['password']);

            ob_start();
            require 'templates/emails/activation.php';
            $content = ob_get_clean();

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($to, $subject, $content, $headers);

            //Informer l'utilisateur pour qu'il vérifie sa boite de reception
            set_flash("Mail d'activation envoyé!", 'success');
            redirect('index.php');
        }

    }else {
        $errors[] = "Veuillez SVP remplir tout les champs!";
    }
}

require 'views/inscription.php';