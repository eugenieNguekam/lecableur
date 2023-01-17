<?php
   include "session.php";
   include "defineAccess.php";
   include "../models/subscribedModel.php";



  if(isset($_POST["cni"],
  $_POST["nom"],
  $_POST["prenom"],
  $_POST["adresse"],
  $_POST["email"],
  $_POST["telephone"],
  $_POST["old-cni"],
  $_POST["id"])){

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
      if(verifyUniqueSubscribed($_POST["old-cni"], $idAgence)){
        if($_POST["old-cni"]!=$_POST["cni"]){

          if(verifyUniqueSubscribed($_POST["cni"], $idAgence))
              $errors["cni"]="ce numéro de cni exite déja dans la base";
          else{
            updateSubscribed($_POST["cni"], $_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["email"], $_POST["telephone"], $_POST["old-cni"]);
            header("Location:"."subscribedList.php", true, 301);
             include "../views/updateSubscribedView.php";
          }

        }
        else{
          updateSubscribed($_POST["cni"], $_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["email"], $_POST["telephone"], $_POST["old-cni"]);
          header("Location:"."subscribedList.php", true, 301);
        }

      }
      else{
         header("Location:"."404_Subscribed.php", true, 301);
      }
    }
    if(count($errors)>0){
      $errors_form=$errors;
      $subscribed=$_POST;
      include "../views/updateSubscribedView.php";
    }


  }


 else{
   if(isset($_GET["id"])){
     $idAgence=$_SESSION["id"];
     $subscribed=getOneSubscribed($_GET["id"], $idAgence);
          if (!$subscribed){
         header("Location:"."404_Subscribed.php", true, 301) ;
     }
     include "../views/updateSubscribedView.php";
   }
    else{
       header("Location:"."404_Subscribed.php", true, 301) ;
    }
 }
