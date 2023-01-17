<?php
  include "session.php";
  include "defineAccess.php";
  include "../models/subscribedModel.php";
  $menu=2;

  if(isset($_GET["id"])){
    $idCableur=$_SESSION["id"];
    $subscribed=getOneSubscribed($_GET["id"], $idCableur);
         if (!$subscribed){
        header("Location:"."404_Subscribed.php", true, 301) ;
    }
      include "../views/readSubscribedView.php";
  }
   else{
      header("Location:"."404_Subscribed.php", true, 301) ;
   }
