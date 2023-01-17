<?php
    include "session.php";
    include "defineAccess.php";
    include "../../models/subscribed/invoiceModel.php";
    $menu=3;

       if(isset($_GET["id"])){
       $id=$_SESSION["id"];
         $invoice=getOneInvoice($id, $_GET["id"],);
         if(!$invoice){
           header("Location:"."404_TypeSubscription.php", true, 301);
         }

     }
     else{
       header("Location:"."404_TypeSubscription.php");
     }


     include "../../views/subscribed/readInvoiceView.php";
