<?php
 include "dbConnexion.php";

 function getAgenceForSubscriber($idSubscriber){
   $db=dbConnect();
   $req=$db->prepare("SELECT id_agence FROM abonne WHERE id=?");
    $req->execute(array($idSubscriber));
    $id=$req->fetch();
    $req->closeCursor();
    $id=$id[0];
    return $id;
 }
 function getInfosAgenceFromSubscribed($idSubscribed){
   $db=dbConnect();
   $req=$db->prepare("SELECT agence.* FROM agence INNER JOIN  abonne
     ON agence.id=abonne.id_agence WHERE abonne.id=?");
    $req->execute(array($idSubscribed));
    $agence=$req->fetch();
    $req->closeCursor();

    return $agence;
 }


 function getTypeSubscriptions($idAgence){
   $db=dbConnect();
   $req=$db->prepare("SELECT typeabonnement.*,  periodicite.nom as periodicite FROM typeabonnement INNER JOIN periodicite ON typeabonnement.idPeriodicite=periodicite.id WHERE idAgence=?");
   $req->execute(array($idAgence));
   return $req;
 }
 function getOneTypeSubscriptions($id){
   $db=dbConnect();
   $req=$db->prepare("SELECT typeabonnement.*,  periodicite.nom as periodicite FROM typeabonnement INNER JOIN periodicite ON typeabonnement.idPeriodicite=periodicite.id WHERE typeabonnement.id=?");
   $req->execute(array($id));
   $typeSubscription=$req->fetch();
   $req->closeCursor();
   return $typeSubscription;
 }
 function getIdPeriodeOneTypeSubscriptions($id){
   $db=dbConnect();
   $req=$db->prepare("SELECT   periodicite.id AS id FROM typeabonnement INNER JOIN periodicite ON typeabonnement.idPeriodicite=periodicite.id WHERE typeabonnement.id=?");
   $req->execute(array($id));
   $typeSubscription=$req->fetch();
   $req->closeCursor();
   return $typeSubscription;
 }

 function verifyTypeSubscriptionExists($id, $idAgence){
   $db=dbConnect();
   $req=$db->prepare("SELECT id FROM typeabonnement where id=? AND  idAgence=?");
   $req->execute(array($id, $idAgence));
   if($req->fetch()){
     $req->closeCursor();
     return TRUE;

   }
  else
    return False;
 }

 function addSubscription(  $idSubscriber, $idTypeSubscription,  $number, $periodicite,$auto, $periode){
   $db=dbConnect();
   if ($periodicite==1){
     $req=$db->prepare("INSERT INTO abonnement(idAbonne, idTypeAbonnement, nombrePeriodicite, dateDebut, dateFin, renouvelementAuto )
     VALUES (?, ?, ?, NOW(), DATE_ADD(NOW(), INTERVAL  ? DAY), ?)");
   }
   else if($periodicite==2){
     $req=$db->prepare("INSERT INTO abonnement(idAbonne, idTypeAbonnement, nombrePeriodicite, dateDebut, dateFin, renouvelementAuto )
     VALUES (?, ?, ?, NOW(), DATE_ADD(NOW(), INTERVAL  ? WEEK), ?)");
   }
   else if($periodicite==3){
     $req=$db->prepare("INSERT INTO abonnement(idAbonne, idTypeAbonnement, nombrePeriodicite, dateDebut, dateFin, renouvelementAuto )
     VALUES (?, ?, ?, NOW(), DATE_ADD(NOW(), INTERVAL  ? MONTH), ?)");
   }

   $req->execute(array($idSubscriber, $idTypeSubscription,$number, $periode ,$auto));
 }

 function getSubscriptions($idSubscriber){
   $db=dbConnect();
   $req=$db->prepare("SELECT abonnement.id AS id, nombrePeriodicite, DATE_FORMAT(dateDebut, '%d %M %Y à %hh:%mmin:%ss') AS dateDebut, DATE_FORMAT(dateFin, '%d %M %Y à %hh:%mmin:%ss') AS dateFin,
     renouvelementAuto, typeabonnement.libelle  as libelle  FROM abonnement INNER JOIN typeabonnement ON abonnement.idTypeAbonnement=typeabonnement.id WHERE abonnement.idAbonne=?");
   $req->execute(array($idSubscriber));
   return $req;
 }


 function verifyUniqueSubscription($idSubscriber, $idSubscription){
   $db=dbConnect();
   $req=$db->prepare("SELECT id FROM abonnement WHERE id=? AND  idAbonne=?");
   $req->execute(array($idSubscription, $idSubscriber));
   if($req->fetch()){
     $req->closeCursor();
     return TRUE;

   }
  else
    return False;
 }

function getSubscription($idSubscription){
  $db=dbConnect();
  $req=$db->prepare("SELECT abonnement.id AS id, nombrePeriodicite, DATE_FORMAT(dateDebut, '%d %M %Y à %hh:%mmin:%ss') AS dateDebut, DATE_FORMAT(dateFin, '%d %M %Y à %hh:%mmin:%ss') AS dateFin,
    renouvelementAuto, typeabonnement.libelle  as libelle, typeabonnement.idPeriodicite as periodicite, typeabonnement.prix AS prix, prixDemarrage, prixResiliation FROM abonnement INNER JOIN typeabonnement ON abonnement.idTypeAbonnement=typeabonnement.id WHERE abonnement.id=?");
  $req->execute(array($idSubscription));
  $subscription=$req->fetch();
  $req->closeCursor();
  return $subscription;
}

function deleteSubscription($idSubscription){
  $db=dbConnect();
  $req=$db->prepare("DELETE FROM abonnement WHERE id=?");
  $req->execute(array($idSubscription));
}

function getSubscriptionForAddInvoice($idSubscribed){
$db=dbConnect();
$req=$db->prepare("SELECT MAX(id) AS maxi FROM abonnement WHERE idAbonne=?");
$req->execute(array($idSubscribed));
$maxi=$req->fetch();
$req->closeCursor();
$maxi=$maxi["maxi"];
$req=$db->prepare("SELECT abonnement.id AS id, nombrePeriodicite,  dateFin,
  renouvelementAuto, typeabonnement.libelle  as libelle, typeabonnement.idPeriodicite as periodicite, typeabonnement.prix AS prix, prixDemarrage, prixResiliation FROM abonnement INNER JOIN typeabonnement ON abonnement.idTypeAbonnement=typeabonnement.id WHERE abonnement.id=?");
$req->execute(array($maxi));
$subscription=$req->fetch();
$req->closeCursor();
return $subscription;
}

function getInvoice($idSubscription){
  $db=dbConnect();
  $req=$db->prepare("SELECT * FROM facture WHERE idAbonnement=?");
  $req->execute(array($idSubscription));
  $invoice=$req->fetch();
  $req->closeCursor();
  return $invoice;
}
