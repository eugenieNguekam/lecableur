<?php
 include "session.php";
 include "defineAccess.php";
include "../models/subscribedModel.php";
$menu=2;

try{
  $idAgence=$_SESSION["id"];
}
catch (Exception $e){
  header("Location:"."404_Subscribed.php");
}
 $response=getSubscribed($idAgence);
 $req=$response[0];
 $count=$response[1]->fetch();
 $response[1]->closeCursor();
 $count=$count[0];

include("../views/subscribedListView.php");
