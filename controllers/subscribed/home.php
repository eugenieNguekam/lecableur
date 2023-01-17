<?php

  include "session.php";
  include "defineAccess.php";
  include "../../models/subscribed/subscription.php";
    $idSubscribed=$_SESSION["id"];
    $agence=getInfosAgenceFromSubscribed($idSubscribed);
  $menu=1;
  include "../../views/subscribed/homeView.php";
