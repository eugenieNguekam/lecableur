<?php

  include "session.php";
  include "defineAccess.php";
  $menu=3;

  include  "../../models/subscribed/invoiceModel.php";

  

  $idSubscribed=$_SESSION["id"];
  $req=getInvoices($idSubscribed);
  //$idAgence=getAgenceForSubscriber($idSubscribed);
  $count=getCountInvoice($idSubscribed);
  include "../../views/subscribed/invoiceView.php";
