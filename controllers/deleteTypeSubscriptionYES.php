<?php
 include "session.php";
 include "defineAccess.php";
 include "../models/subscriptionModel.php";
 $menu=3;



 if(isset($_GET["id"])){
    $idAgence=$_SESSION["id"];
   $subscribed=getOneTypeSubscription($_GET["id"], $idAgence);
        if (!$subscribed){
       header("Location:"."404_TypeSubscription.php", true, 301) ;
   }
   $number=(int)getNumberSubscribedForTypeSubscription($_GET["id"]);
   print_r($number);
      if($number>0){
        echo "tmlllllllllllllllllllllllllllllllllllllll";
        $_SESSION["suppression-type-abonnement-echoue"]=TRUE;
        header("Location:"."subscription.php", true, 301) ;
      }
   deleteTypeSubscription($_GET["id"], $idAgence);
   $_SESSION["suppression-type-abonnement-reussi"]=TRUE;
   header("Location:"."subscription.php", true, 301) ;

 }
  else{
     header("Location:"."404_TypeSubscription.php", true, 301) ;
  }
