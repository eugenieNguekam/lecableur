<?php

  include "session.php";
  include "defineAccess.php";
  $menu=3;
  include "../models/subscriptionModel.php";




  if(isset($_GET["id"])){
      $idAgence=$_SESSION["id"];
    if(verifyUniqueSubscription($idAgence, $_GET["id"])){
      $subscription=getSubscription($_GET["id"]);
      $invoice=getInvoice($_GET["id"]);
      

      include "../views/readSubscriptionView.php";
    }
    else{

        header("Location:"."404_TypeSubscription.php", true, 301);
    }
  }
  else{
      header("Location:"."404_TypeSubscription.php", true, 301);
  }
