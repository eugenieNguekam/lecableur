<?php

  include "session.php";
  include "defineAccess.php";
  $menu=2;

  include  "../../models/subscribed/subscription.php";
  if(isset($_GET["id"])){
      $idSubscriber=$_SESSION["id"];
    if(verifyUniqueSubscription($idSubscriber, $_GET["id"])){
      $subscription=deleteSubscription($_GET["id"]);
      header("Location:"."subscriptions.php", true, 301);

    }
    else{
        header("Location:"."404_TypeSubscription.php", true, 301);
    }
  }
  else{
      header("Location:"."404_TypeSubscription.php", true, 301);
  }
