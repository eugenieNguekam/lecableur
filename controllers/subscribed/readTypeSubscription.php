<?php

  include "session.php";
  include "defineAccess.php";
  $menu=2;

  include  "../../models/subscribed/subscription.php";

  if(isset($_GET["id"])){
    $idSubscriber=$_SESSION["id"];
    $idAgence=getAgenceForSubscriber($idSubscriber);
    if(verifyTypeSubscriptionExists($_GET["id"], $idAgence)){
       $typeSubscription=getOneTypeSubscriptions($_GET["id"]);
      
      include "../../views/subscribed/readTypeSubscriptionView.php";
    }
    else{
      header("Location:"."404_TypeSubscription.php", true, 301);
    }

  }
  else{
      header("Location:"."404_TypeSubscription.php", true, 301);
  }
