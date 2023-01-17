<?php
include "dbConnexion.php";

function addPayment($idFacture, $price, $totalPrice){
  $db=dbConnect();
  $req=$db->prepare("INSERT INTO paiement(idFacture, montant, datePaiement)
  VALUES(?, ?, NOW())");
  $req->execute(array($idFacture, $price));

  $req=$db->prepare("UPDATE facture SET resteAPayer=? WHERE id=?");
  $price_=(float)$totalPrice-(float)$price;
  $req->execute(array($price_, $idFacture));
}
