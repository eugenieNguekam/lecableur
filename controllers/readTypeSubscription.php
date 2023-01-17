<?php
    include "session.php";
    include "defineAccess.php";
    include "../models/subscriptionModel.php";
    $menu=3;



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
     $numberSubscribed=getNumberSubscribedForTypeSubscription($_GET["id"]);
     $periodicites=getPeriodicites();
     include "../views/readTypeSubscriptionView.php";
