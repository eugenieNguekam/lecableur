<?php
  include "dbConnexion.php";
  function getPeriodicites(){
    $db=dbConnect();
    $periodicites=$db->query("SELECT * FROM  periodicite");
    return $periodicites;
  }

function addTypeSubscription($libelle, $idAgence, $idPeriodicite, $prix, $description,  $prixDemarrage, $prixResiliation){
  $db=dbConnect();
  $req=$db->prepare("INSERT INTO typeabonnement(libelle, idAgence, idPeriodicite, prix, description, prixDemarrage, prixResiliation)
   VALUES(?, ?, ? ,? ,?, ?, ?) ");
   $req->execute(array($libelle, $idAgence, $idPeriodicite, $prix, $description,  $prixDemarrage, $prixResiliation));
   return TRUE;
}

function getTypesSubscriptions($idAgence){
  $db=dbConnect();
  $req1=$db->prepare("SELECT typeabonnement.id as id, libelle, idAgence, idPeriodicite, prix, prixDemarrage, prixResiliation, periodicite.nom AS periode FROM typeabonnement INNER JOIN periodicite
    ON typeabonnement.idPeriodicite=periodicite.id WHERE  idPeriodicite=1 AND idAgence=?");
  $req1->execute(array($idAgence));
  $req2=$db->prepare("SELECT typeabonnement.id as id, libelle, idAgence, idPeriodicite, prix, prixDemarrage, prixResiliation, periodicite.nom AS periode FROM typeabonnement INNER JOIN periodicite
    ON typeabonnement.idPeriodicite=periodicite.id WHERE  idPeriodicite=2 AND idAgence=?");
  $req2->execute(array($idAgence));
  $req3=$db->prepare("SELECT typeabonnement.id as id, libelle, idAgence, idPeriodicite, prix, prixDemarrage, prixResiliation, periodicite.nom AS periode FROM typeabonnement INNER JOIN periodicite
    ON typeabonnement.idPeriodicite=periodicite.id WHERE  idPeriodicite=3 AND idAgence=?");
  $req3->execute(array($idAgence));
  $req4=$db->prepare("SELECT COUNT(*) AS nombre from typeabonnement WHERE idAgence=?");
  $req4->execute(array($idAgence));
  return array($req1, $req2, $req3, $req4);
}

function veryfyUniqueSubscribtion($libelle, $idAgence){
  $db=dbConnect();
    $req=$db->prepare("SELECT id FROM typeabonnement WHERE libelle=? AND idAgence=?");
    $req->execute(array($libelle, $idAgence));
    if($req->fetch()){
      return FALSE;
      }
    return TRUE;

}

function getOneTypeSubscription($id, $idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT * FROM typeabonnement WHERE id=? AND idAgence=?");
  $req->execute(array($id, $idAgence));
  if($typeSubscription=$req->fetch()){
    $req->closeCursor();
    return $typeSubscription;
  }
  else{
    return FALSE;
  }

}
function updateTypeSubscription($libelle, $idPeriodicite, $prix, $description,  $prixDemarrage, $prixResiliation, $ancienLibelle, $idAgence){
  $db=dbConnect();
  $req=$db->prepare("UPDATE typeabonnement SET libelle=?, idPeriodicite=?, prix=?, description=?, prixDemarrage=?, prixResiliation=?
   WHERE libelle=? AND idAgence=? ");
   $req->execute(array($libelle, $idPeriodicite, $prix, $description,  $prixDemarrage, $prixResiliation, $ancienLibelle,  $idAgence));
   return TRUE;
}

function deleteTypeSubscription($id, $idAgence){
    $db=dbConnect();
    $req=$db->prepare("DELETE FROM typeabonnement WHERE id=? AND idAgence=?");
    $req->execute(array($id, $idAgence));
}

function getNumberSubscribedForTypeSubscription($id){
  $db=dbConnect();
  $req=$db->prepare("SELECT COUNT(*) AS nombre FROM abonnement WHERE idTypeAbonnement=?");
  $req->execute(array($id));
  $number=$req->fetch();
  $req->closeCursor();
  $number=$number["nombre"];
  return $number;

}
function verifyUniqueSubscription($idAgence, $idSubscription){
  $db=dbConnect();
  $req=$db->prepare("SELECT abonnement.id FROM abonnement INNER JOIN abonne
    ON abonnement.idAbonne=abonne.id WHERE abonnement.id=? AND  abonne.id_agence=?");
  $req->execute(array($idSubscription, $idAgence));
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
function getInvoice($idSubscription){
  $db=dbConnect();
  $req=$db->prepare("SELECT * FROM facture WHERE idAbonnement=?");
  $req->execute(array($idSubscription));
  $invoice=$req->fetch();
  $req->closeCursor();
  return $invoice;
}
