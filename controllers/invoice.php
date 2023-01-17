<?php
 include "session.php";
 include "defineAccess.php";
 include "../models/dbConnexion.php";
include "../models/invoiceModel.php";
$menu=4;

try{
  $idAgence=$_SESSION["id"];
}
catch (Exception $e){
  header("Location:"."404_Subscribed.php");
}

$idAgence=$_SESSION["id"];
if(isset($_GET["idAbonne"])){
  $req=getInvoicesForSubscribed($_GET["idAbonne"], $idAgence);
  $count=getCountInvoicesForSubscribed($_GET["idAbonne"], $idAgence);
}
else if(isset($_GET["number"])){
  if($_GET["number"]!=""){
    $req=getOneInvoiceFromNumInvoice($_GET["number"], $idAgence);
    $count=1;
  }
  else{
    $count=getCountInvoice($idAgence);
    $req=getInvoices($idAgence);
    $_GET["filter"]="5";

  }

}
else if(isset($_GET["filter"])){
  if($_GET["filter"]=="1"){
    $req=getInvoicesNoPaidBeforeLimitDate($idAgence);
    $count=getCountInvoicesNoPaidBeforeLimitDat($idAgence);
  }
  else if ($_GET["filter"]=="2"){
    $req=getInvoicesNoPaidAfterLimitDate($idAgence);
    $count=getCountInvoicesNoPaidAfterLimitDate($idAgence);
  }
  else if ($_GET["filter"]=="3"){
    $req=getInvoicesNoPaid($idAgence);
    $count=getCountInvoicesNoPaid($idAgence);
  }
  else if ($_GET["filter"]=="4"){
    $req=getInvoicesPaid($idAgence);
    $count=getCountInvoicesPaid($idAgence);
  }
  else{
    $count=getCountInvoice($idAgence);
    $req=getInvoices($idAgence);
  }
}
else{
  $count=getCountInvoice($idAgence);
  $req=getInvoices($idAgence);
  $_GET["filter"]="5";



}

  include("../views/invoiceView.php");
