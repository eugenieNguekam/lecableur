<?php

  //include "dbConnexion.php";


 function addInvoice($numInvoice, $overviewInvoice, $price, $dateEndSubscription, $idSubscription, $idAgence){
   $db=dbConnect();
   $req=$db->prepare("INSERT INTO facture(numFacture, libelleFacture, montant, resteAPayer, dateDelai, idAbonnement, idAgence)
   VALUES(?, ?, ?, ?, DATE_ADD(?, INTERVAL 10 DAY), ?, ?)");
   $req->execute(array($numInvoice, $overviewInvoice, $price,  $price, $dateEndSubscription, $idSubscription, $idAgence ));


 }


function getCountInvoice($idAgence){
   $db=dbConnect();
   $req=$db->prepare("SELECT COUNT(*) AS nombre FROM facture WHERE idAgence=?");
   $req->execute(array($idAgence));
   $count=$req->fetch();
   $req->closeCursor();
   $count=$count["nombre"];
   return $count;
}

function getOneInvoice($id, $idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence
     FROM facture WHERE id=? AND idAgence=?");
  $req->execute(array($id, $idAgence));
  if($invoice=$req->fetch()){
    $req->closeCursor();
    return $invoice;
  }
  else{
    return FALSE;
  }

}


function getInvoices($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence FROM facture WHERE idAgence=?");
  $req->execute(array($idAgence));
  return $req;

}

function getInvoicesForSubscribed($idSubscribed, $idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT facture.id AS id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence FROM facture
  INNER JOIN abonnement ON facture.idAbonnement=abonnement.id WHERE facture.idAgence=? AND abonnement.idAbonne=?");
  $req->execute(array($idAgence, $idSubscribed));
  return $req;

}
function getCountInvoicesForSubscribed($idSubscribed, $idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT COUNT(*) AS nombre FROM facture
  INNER JOIN abonnement ON facture.idAbonnement=abonnement.id WHERE facture.idAgence=? AND abonnement.idAbonne=?");
  $req->execute(array($idAgence, $idSubscribed));
  $count=$req->fetch();
  $req->closeCursor();
  $count=$count["nombre"];
  return $count;

}
function getSubscriptionForInvoice($idInvoice){
  $db=dbConnect();
  $req=$db->prepare("SELECT abonnement.idTypeAbonnement , abonnement.id, DATE_FORMAT(abonnement.dateDebut, '%d %M %Y à %hh:%mmin:%ss') AS dateDebut,
  DATE_FORMAT(dateFin, '%d %M %Y à %hh:%mmin:%ss') AS dateFin FROM facture
  INNER JOIN abonnement ON facture.idAbonnement=abonnement.id WHERE facture.id=?" );
  $req->execute(array($idInvoice));
  $subscription=$req->fetch();
  $req->closeCursor();
  return $subscription;

}

function getTypeSubscriptionForInvoice($idTypeSubscription){
  $db=dbConnect();
  $req=$db->prepare("SELECT libelle FROM typeabonnement WHERE id=?" );
  $req->execute(array($idTypeSubscription));
  $typeSubscription=$req->fetch();
  $req->closeCursor();
  return $typeSubscription;

}
function getSubscribedForInvoice($idSubscription){
  $db=dbConnect();
  $req=$db->prepare("SELECT abonne.* FROM abonnement
  INNER JOIN abonne ON abonnement.idAbonne=abonne.id WHERE abonnement.id=?" );
  $req->execute(array($idSubscription));
  $subscribed=$req->fetch();
  $req->closeCursor();
  return $subscribed;
}
function getAgenceForInvoice($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT * FROM agence where id=?" );
  $req->execute(array($idAgence));
  $agence=$req->fetch();
  $req->closeCursor();
  return $agence;
}

function getOneInvoice_($id, $idInvoice){
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


function getOneInvoiceFromNumInvoice($numInvoice, $idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence
     FROM facture  WHERE numFacture=? AND idAgence=?");
  $req->execute(array($numInvoice, $idAgence));

  return $req;

}

function getInvoicesNoPaidBeforeLimitDate($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence
     FROM facture  WHERE idAgence=? AND dateDelai >=NOW() AND resteAPayer>0");
  $req->execute(array($idAgence));

  return $req;

}
function getCountInvoicesNoPaidBeforeLimitDat($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT COUNT(*) AS nombre
     FROM facture  WHERE idAgence=? AND dateDelai >=NOW()  AND resteAPayer>0");
  $req->execute(array($idAgence));
  $count=$req->fetch();
  $req->closeCursor();
  $count=$count["nombre"];
  return $count;
}

function getInvoicesNoPaidAfterLimitDate($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence
     FROM facture  WHERE idAgence=? AND dateDelai < NOW()  AND resteAPayer>0");
  $req->execute(array($idAgence));

  return $req;

}
function getCountInvoicesNoPaidAfterLimitDate($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT COUNT(*) AS nombre
     FROM facture  WHERE idAgence=? AND dateDelai < NOW()  AND resteAPayer>0");
  $req->execute(array($idAgence));
  $count=$req->fetch();
  $req->closeCursor();
  $count=$count["nombre"];
  return $count;
}

function getInvoicesNoPaid($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence
     FROM facture  WHERE idAgence=?  AND resteAPayer>0");
  $req->execute(array($idAgence));

  return $req;

}
function getCountInvoicesNoPaid($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT COUNT(*) AS nombre
     FROM facture  WHERE idAgence=?  AND resteAPayer>0");
  $req->execute(array($idAgence));
  $count=$req->fetch();
  $req->closeCursor();
  $count=$count["nombre"];
  return $count;
}


function getInvoicesPaid($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT id, numFacture, libelleFacture,montant, resteAPayer, DATE_FORMAT(dateDelai, '%d %M %Y à %hh:%mmin:%ss') AS dateDelai, idAbonnement, idAgence
     FROM facture  WHERE idAgence=?  AND resteAPayer<=0");
  $req->execute(array($idAgence));

  return $req;

}
function getCountInvoicesPaid($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT COUNT(*) AS nombre
     FROM facture  WHERE idAgence=?  AND resteAPayer<=0");
  $req->execute(array($idAgence));
  $count=$req->fetch();
  $req->closeCursor();
  $count=$count["nombre"];
  return $count;
}
