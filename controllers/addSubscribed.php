<?php
    include "session.php";
    include "defineAccess.php";
    include "../models/subscribedModel.php";
    $menu=2;
    if(isset($_POST["cni"],
    $_POST["nom"],
    $_POST["prenom"],
    $_POST["adresse"],
    $_POST["email"],
    $_POST["telephone"], )){

      $errors=array();
      if(!preg_match("~^[1-9]{1}[0-9]{1,8}$~", $_POST["cni"])){
        $errors["cni"]="CNI invalide";
      }
      if(!preg_match("~^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\'._ \s-]+$~", $_POST["nom"])){
        $errors["nom"]="Nom invalide";
      }
      if(!preg_match("~^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\'._ \s-]+$~", $_POST["prenom"])){
        $errors["prenom"]="Prénom invalide";
      }
      if(!preg_match("~^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\':._ \s-]+$~", $_POST["adresse"])){
        $errors["adresse"]="Adresse invalide";
      }
      if(!preg_match('~^[a-zA-Z0-9."_]+[@]{1}[a-zA-Z0-9."_]+[.]{1}[a-z]{2,10}$~', $_POST["email"])){
        $errors["email"]="Email invalide";
      }
      if(!preg_match("~^[6]{1}[2]|[5-9]{1}[0-9]{7}$~", $_POST["telephone"])){
        $errors["telephone"]="Numéro téléphone invalide";
      }
      $idAgence=$_SESSION["id"];

      if(count($errors)==0){
        try{
          $idAgence=$_SESSION["id"];
        }
        catch (Exception $e){
          header("Location:"."404_Subscribed.php");
        }
        if(!verifyUniqueSubscribed($_POST["cni"], $idAgence)){
          $chaine1="abcdefghijklmnopqrstubwxyz";
          $chaine1=str_shuffle($chaine1);
          $chaine1=substr($chaine1,0, 2);
          $chaine2="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
          $chaine2=str_shuffle($chaine2);
          $chaine2=substr($chaine2, 0, 2);
          $chaine3="1234567890";
          $chaine3=str_shuffle($chaine3);
          $chaine3=substr($chaine3, 0, 2);
          $chaine4="<>,;:$!?./";
          $chaine4=str_shuffle($chaine4);
          $chaine4=substr($chaine4, 0, 2);
          echo $chaine1;
          $chaine="$chaine1"."$chaine2"."$chaine3"."$chaine4";
          $motDePasse=str_shuffle($chaine);
          $nomUtilisateur="abonne"."_".(getLastIdAbonne()+1);
          addSubscribed($_POST["cni"], $nomUtilisateur,  $motDePasse, $_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["email"], $_POST["telephone"], $idAgence);
          $_SESSION["nom-utilisateur-dernier-ajoute"]=$nomUtilisateur;
          $_SESSION["mot-de-passe-dernier-ajoute"]=$motDePasse;
          header("Location:"."subscribedList.php", true, 301);
        }
        else{
           $errors["cni"]="ce numéro de cni exite déja dans la base";
        }

      }
      if(count($errors)>0){
        $errors_form=$errors;

      }


    }


    include "../views/addSubscribedView.php";
