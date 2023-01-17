<?php
    session_start();
    include "defineAccess.php";
    if (isset($_POST["nom-utilisateur"],$_POST["nom-agence"], $_POST["adresse"], $_POST["email"], $_POST["mot-de-passe"],
    $_POST["confirmation-mot-de-passe"])){

        //Validation des champs côté serveur.
        $errors=array();
        if(!preg_match("~^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\':._ \s-]+$~", $_POST["nom-utilisateur"])){
          $errors["nom-utilisateur"]="Entrée invalide";
        }
        if(!preg_match("~^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\':._ \s-]+$~", $_POST["nom-agence"])){
          $errors["nom-agence"]="Entrée invalide";
        }
        if(!preg_match("~^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\':._ \s-]+$~", $_POST["adresse"])){
          $errors["adresse"]="Entrée invalide";
        }

        if(!preg_match('~^[a-zA-Z0-9."_]+[@]{1}[a-zA-Z0-9."_]+[.]{1}[a-z]{2,10}$~', $_POST["email"])){
          $errors["email"]="email invalide";
        }
        if(strlen($_POST["mot-de-passe"])<4){
          $errors["mot-de-passe"]="Entrez un mot de passe au moins 4 caractères";
        }
        else{
          if($_POST["mot-de-passe"]!=$_POST["confirmation-mot-de-passe"]){
            $errors["mot-de-passe"]="Les deux mots de passe sont différents";
          }

        }



        if(count($errors)==0){
            include "../models/registerModel.php";
            if(!verifyUniqueUser($_POST["nom-utilisateur"])){
                  registerAgence($_POST["nom-agence"], $_POST["adresse"], $_POST["email"], $_POST["nom-utilisateur"], $_POST["mot-de-passe"]);

                  //Connexion

                  $agence=loginUserAfterRegister($_POST["nom-utilisateur"]);

                  $_SESSION["id"]=$agence["id"];
                  $_SESSION["nom-utilisateur"]=$agence["nomUtilisateur"];
                  $_SESSION["status"]="agence";
                  header("Location:"."home.php", true, 301);


                }

            else{
              $errors["nom-utilisateur"]="Ce nom d'utilisateur existe déja, entrez un autre.";
            }
        }
        if(count($errors)>0){
          $errors_form=$errors;

          //header("Location:"."../views/loginView.php", true, 301);
                }



    }
    include "../views/registerView.php";
