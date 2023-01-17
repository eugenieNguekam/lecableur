<?php
session_start();
//print_r($_SESSION);
include "defineAccess.php";
include "../Models/loginModel.php";
 if(isset($_POST["nom-utilisateur"], $_POST["mot-de-passe"])){
  $user=loginUser($_POST["nom-utilisateur"], $_POST["mot-de-passe"]);
  if($user==FALSE){
     $error="La combinaison mot de passe et nom d'utilisateur est invalide";
     include "../views/loginView.php";
   }
   else{
     echo "connexion réussi";
     $_SESSION["id"]=$user["id"];
     $_SESSION["nom-utilisateur"]=$user["nomUtilisateur"];
     $_SESSION["status"]=$user["status"];
     if($user["status"]=="abonne"){
         header("Location:"."subscribed/home.php", true, 301);

     }
     else{
       header("Location:"."home.php", true, 301);
     }

   }
 }
 else{
   include "../views/loginView.php";
 }
