<?php
 include "session.php";
 include "defineAccess.php";
 include "../models/subscribedModel.php";
 $menu=2;



 if(isset($_GET["id"])){
   $idAgence=$_SESSION["id"];
   $subscribed=getOneSubscribed($_GET["id"], $idAgence);
        if (!$subscribed){
       header("Location:"."404_Subscribed.php", true, 301) ;
   }
   deleteSubscribed($_GET["id"], $idAgence);
   header("Location:"."subscribedList.php", true, 301) ;

 }
  else{
     header("Location:"."404_Subscribed.php", true, 301) ;
  }
