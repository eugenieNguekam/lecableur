<?php
include "session.php";
include "defineAccess.php";
include "../models/paymentModel.php";
include "../models/invoiceModel.php";
$menu=3;

if(isset($_POST["price"], $_POST["id"])){
  $idAgence=$_SESSION["id"];
  $invoice=getOneInvoice($_POST["id"], $idAgence);
    if(!$invoice){
      header("Location:"."404_Invoice.php", true, 301);
    }
    if((float)$_POST["price"]!=0){
      //if(((float)$_POST["price"]>(float)$invoice["montant"]) || float())
      ////print_r($invoice["resteAPayer"]); echo "<br/>";
      //print_r($_POST["price"]);echo "<br/>";
      //$price=(float)$invoice["resteAPayer"]-(float)$_POST["price"];
      //print_r($price);

      addPayment($invoice["id"], $_POST["price"], $invoice["resteAPayer"]);
      header("Location:"."readInvoice.php?id=".$_POST["id"], true, 301);
    }
    else{
      $form_errors["price"]="Le prix est invalide";
      include "../views/readInvoiceView.php";

    }

  }
