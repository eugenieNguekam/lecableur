<?php
include "session.php";
include "defineAccess.php";
include "../models/subscriptionModel.php";
$menu=3;

if (isset($_POST["overview"], $_POST["periode"], $_POST["price"], $_POST["starter-price"], $_POST["finisher-price"], $_POST["description"])){


  $errors=array();
  if(strlen($_POST["overview"])>30 || strlen($_POST["overview"])==0)
    $errors["overview"]="le libellé doit être compris entre 1 et 30 caractères";
    $periode=(int)$_POST["periode"];
  if((!is_int($periode) || $periode>3 ) || $periode<1)
    $errors["periode"]="Periode invalide";

    $price=(float)$_POST["price"];
  if(!is_float($price) || $price<0)
    $errors["price"]="Prix invalide";
  $starterPrice=(float)$_POST["starter-price"];
  if(!is_float($starterPrice) || $starterPrice<0)
    $errors["starter-price"]="Prix invalide";

    $finisherPrice=(float)$_POST["finisher-price"];
  if(!is_float($finisherPrice) || $finisherPrice<0)
    $errors["finisher-price"]="Prix invalide";
  if(strlen($_POST["description"])<5)
   $errors["description"]="Description trop courte";

   print_r($errors);

   if(count($errors)==0){
     $idAgence=$_SESSION["id"];
     if(veryfyUniqueSubscribtion($_POST["overview"], $idAgence)){
       $idAgence=$_SESSION["id"];
       addTypeSubscription($_POST["overview"], $idAgence, $_POST["periode"], $_POST["price"], $_POST["description"], $_POST["starter-price"], $_POST["finisher-price"]);
       $_SESSION["ajout-type-abonnement-reussi"]=TRUE;
       header("Location:"."subscription.php", true, 301);
       //header("Location:"."subscribedList.php", true, 301);
     }
     $errors["overview"]="cette ofrre existe déja.";
      $errors_form=$errors;


   }
   else{
     $errors_form=$errors;
   }

 }



$periodicites=getPeriodicites();
include "../views/addTypeSubscriptionView.php";
