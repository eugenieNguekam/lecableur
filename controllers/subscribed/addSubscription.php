<?php

  include "session.php";
  include "defineAccess.php";
  $menu=2;

  include  "../../models/subscribed/subscription.php";
  include "../../models/invoiceModel.php";

  if(isset($_GET["id"], $_GET["number-periode"])){
    print_r($_GET);
    $number=(int)$_GET["number-periode"];
    if($number>0){
      $idSubscribed=$_SESSION["id"];
      $idAgence=getAgenceForSubscriber($idSubscribed);
      if(verifyTypeSubscriptionExists($_GET["id"], $idAgence)){
        print_r("fdslkfjsldkjqflkfjlkqsfjklqsdf");
        $auto=1;
        $id=getIdPeriodeOneTypeSubscriptions($_GET["id"]);
        $periodicite=$id["id"];
        $periode=$periodicite*$number;
        if(!isset($_GET["auto"]))
          	$auto=0;
          addSubscription( $idSubscribed, $_GET["id"],  $_GET["number-periode"],  $periodicite, $auto, $periode);
          $count=(int)getCountInvoice($idAgence);
          $numInvoice=date("j-n-Y")."-".($count+1);
          $typeSubscription=getOneTypeSubscriptions($_GET["id"]);
          $overviewInvoice="Abonnement";
          $price=$typeSubscription["prix"]*$number+$typeSubscription["prixDemarrage"];
          $subscription=getSubscriptionForAddInvoice($idSubscribed);
          $dateEndSubscription=$subscription["dateFin"];
          $idSubscription=$subscription["id"];

          addInvoice($numInvoice, $overviewInvoice, $price, $dateEndSubscription, $idSubscription, $idAgence);
          header("Location:"."subscriptions.php", true, 301);
      }
      else{
        header("Location:"."404_TypeSubscription.php", true, 301);
      }
    }
    else{
    header("Location:"."404_TypeSubscription.php", true, 301);
    }

  }
 else{
   header("Location:"."404_TypeSubscription.php", true, 301);
 }
