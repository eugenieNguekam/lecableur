<?php
    include "session.php";
    include "defineAccess.php";
    include "../models/subscriptionModel.php";
    $menu=3;

    if (isset($_POST["old-overview"], $_POST["overview"], $_POST["periode"], $_POST["price"], $_POST["starter-price"], $_POST["finisher-price"], $_POST["description"])){

       print_r($_POST);
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
         if($_POST["overview"]!=$_POST["old-overview"]){
           if(!veryfyUniqueSubscribtion($_POST["overview"], $idAgence)){
              $errors["overview"]="cette ofrre existe déja.";
              $errors_form=$errors;
           }
           else{
             updateTypeSubscription($_POST["overview"], $_POST["periode"], $_POST["price"], $_POST["description"], $_POST["starter-price"], $_POST["finisher-price"],$_POST["old-overview"] ,$idAgence);
             $_SESSION["modification-type-abonnement-reussi"]=TRUE;
            header("Location:"."subscription.php", true, 301);
           }
         }
         else{
           updateTypeSubscription($_POST["overview"], $_POST["periode"], $_POST["price"], $_POST["description"], $_POST["starter-price"], $_POST["finisher-price"],$_POST["old-overview"] ,$idAgence);
           $_SESSION["modification-type-abonnement-reussi"]=TRUE;
           header("Location:"."subscription.php", true, 301);

         }


       }
       else{
         $errors_form=$errors;
       }

     }
     else{

       if(isset($_GET["id"])){
       $idAgence=$_SESSION["id"];
         $typeSubscription=getOneTypeSubscription((int)$_GET["id"], $idAgence);
         if(!$typeSubscription){
           header("Location:"."404_TypeSubscription.php", true, 301);
         }

     }
     else{
       header("Location:"."404_TypeSubscription.php");
     }

     $periodicites=getPeriodicites();
     include "../views/updateTypeSubscriptionView.php";
   }
