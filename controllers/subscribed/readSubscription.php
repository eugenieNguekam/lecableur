<?php

  include "session.php";
  include "defineAccess.php";
  $menu=2;

  include  "../../models/subscribed/subscription.php";
  if(isset($_GET["id"])){
      $idSubscriber=$_SESSION["id"];
    if(verifyUniqueSubscription($idSubscriber, $_GET["id"])){
      $subscription=getSubscription($_GET["id"]);
      $invoice=getInvoice($_GET["id"]);
    
      include "../../views/subscribed/readSubscriptionView.php";
    }
    else{
        header("Location:"."404_TypeSubscription.php", true, 301);
    }
  }
  else{
      header("Location:"."404_TypeSubscription.php", true, 301);
  }
