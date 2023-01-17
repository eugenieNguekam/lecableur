<?php
  include "session.php";
  include "defineAccess.php";
  include "../models/registerModel.php";
  $menu=6;

  try{
    $idAgence=$_SESSION["id"];
  }
  catch (Exception $e){
    header("Location:"."404_Subscribed.php");
  }

  $agence=getAgence($idAgence);


  if(isset($_POST["nom-agence"],$_POST["adresse"],$_POST["email"],$_POST["telephone-1"], $_POST["telephone-2"], $_FILES["logo"]))

  {

    $errors=array();

    if(!preg_match("~^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\'._ \s-]+$~", $_POST["nom-agence"])){
      $errors["nom-agence"]="Nom agence invalide";
    }

    if(!preg_match("~^[a-zA-Zéèçàù]{1}[a-zA-Z0-9éèçà\':._ \s-]+$~", $_POST["adresse"])){
      $errors["adresse"]="Adresse invalide";
    }

    if(!preg_match('~^[a-zA-Z0-9."_]+[@]{1}[a-zA-Z0-9."_]+[.]{1}[a-z]{2,10}$~', $_POST["email"])){
      $errors["email"]="Email invalide";
    }
    if($_POST["telephone-1"]!=""){
      if(!preg_match("~^[6]{1}[2]|[5-9]{1}[0-9]{7}$~", $_POST["telephone-1"])){
        $errors["telephone-1"]="Numéro téléphone invalide";
      }
    }

    if($_POST["telephone-2"]!=""){
      if(!preg_match("~^[6]{1}[2]|[5-9]{1}[0-9]{7}$~", $_POST["telephone-2"])){
        $errors["telephone-2"]="Numéro téléphone invalide";
      }
    }

    if(count($errors)==0){
      if($_FILES["logo"]["error"]==0){
        if($_FILES["logo"]["size"]<=4000000){
          $infoFiles=pathinfo($_FILES["logo"]["name"]);
          $extension=$infoFiles["extension"];
          $allowedExtensions=array("jpg", "jpeg", "png", "gif");
          if(in_array($extension, $allowedExtensions)){
            $logo="logo-".$agence["nomUtilisateur"].".".$extension;
            move_uploaded_file($_FILES["logo"]["tmp_name"], "../logos/".$logo);
          }
          else{
            $errors["logo"]="Le système n'accepte que les fichiers images aux extensions jpg, jpeg, png ou gif";
          }
        }
        else{
          $errors["logo"]="L'image ne peut pas dépasser 4 MO";
        }
      }
      else{
       $logo=$agence["logo"];

      }
      if(count($errors)!=0){
        $errors_form=$errors; echo "<br/>";
        print_r($errors_form);
      }
      else{
        updateAgence($idAgence, $_POST["nom-agence"], $_POST["adresse"], $_POST["email"], $_POST["telephone-1"], $_POST["telephone-2"], $logo);
      }


    }
    else{
      $errors_form=$errors; echo "<br/>";
      print_r($errors_form);
    }
  }
    $agence=getAgence($idAgence);
  include "../views/countView.php";
