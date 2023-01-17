<?php

    include "session.php";
    include "defineAccess.php";
    include "../../models/subscribed/dbConnexion.php";
    include "../../models/invoiceModel.php";

    $menu=3;
      use Dompdf\Dompdf;

    if(isset($_GET["id"])){

    $idSubscribed=$_SESSION["id"];
      $invoice=getOneInvoice_($idSubscribed, $_GET["id"]);
      if(!$invoice){

        header("Location:"."404_TypeSubscription.php", true, 301);
      }
      $agence=getAgenceForInvoice($invoice["idAgence"]);
      $subscription=getSubscriptionForInvoice($_GET["id"]);
      $subscribed=getSubscribedForInvoice($subscription["id"]);
      $typeSubscription=getTypeSubscriptionForInvoice($subscription["idTypeAbonnement"]);



       ob_start();
        include "../../views/subscribed/documentInvoice.php";
       $html=ob_get_contents();
       ob_end_clean();



        //include "../views/documentInvoice.php";


        require_once "../../dompdf/autoload.inc.php";
        $dompdf=new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper("A4","Portrait");
        $dompdf->render();
        $dompdf->stream();

  }
  else{
    header("Location:"."404_TypeSubscription.php", true, 301);


  }
