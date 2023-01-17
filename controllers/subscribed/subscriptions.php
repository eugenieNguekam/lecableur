<?php

  include "session.php";
  include "defineAccess.php";
  $menu=2;

  include  "../../models/subscribed/subscription.php";

  $idSubscriber=$_SESSION["id"];
  $idAgence=getAgenceForSubscriber($idSubscriber);
  $typesSubscriptions=getTypeSubscriptions($idAgence);
  $subscriptions=getSubscriptions($idSubscriber);


  include "../../views/subscribed/subscriptionView.php";
