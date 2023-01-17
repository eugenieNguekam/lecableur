<?php
 include "dbConnexion.php";
 function getInvoices($idSubscribed){
   $db=dbConnect();
   $req=$db->prepare("SELECT facture.* FROM facture INNER JOIN abonnement ON
     facture.idAbonnement=abonnement.id  WHERE abonnement.idAbonne=?");
   $req->execute(array($idSubscribed));
   return $req;
 }

 function getCountInvoice($idSubscribed){
   $db=dbConnect();
   $req=$db->prepare("SELECT COUNT(*) AS nombre FROM facture INNER JOIN abonnement ON
     facture.idAbonnement=abonnement.id  WHERE abonnement.idAbonne=?");
   $req->execute(array($idSubscribed));
   $count=$req->fetch();
   $req->closeCursor();
   $count=$count["nombre"];
   return $count;

 }

 function getOneInvoice($id, $idInvoice){
   $db=dbConnect();
   $req=$db->prepare("SELECT facture.id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence
      FROM facture INNER JOIN abonnement ON
      facture.idAbonnement=abonnement.id WHERE abonnement.idAbonne=? AND facture.id=? ");
   $req->execute(array($id, $idInvoice));
   if($invoice=$req->fetch()){
     $req->closeCursor();
     return $invoice;
   }
   else{
     return FALSE;
   }
 }
