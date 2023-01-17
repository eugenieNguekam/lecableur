<?php
    include "session.php";
    include "defineAccess.php";
    include "../models/dbConnexion.php";
    include "../models/invoiceModel.php";
    $menu=3;



       if(isset($_GET["id"])){
       $idAgence=$_SESSION["id"];
         $invoice=getOneInvoice((int)$_GET["id"], $idAgence);

         if(!$invoice){
           header("Location:"."404_TypeSubscription.php", true, 301);
         }

     }
     else{
       header("Location:"."404_TypeSubscription.php");
     }


     include "../views/readInvoiceView.php";
