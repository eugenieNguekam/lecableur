<?php include "../controllers/accessPage.php"; ?>
<?php

    include "dbConnexion.php";
 //Verifier que l'utilisateur avec un nom utilisateur indentique n'existe pas dans la base
  function verifyUniqueUser($nomUtilisateur){
    $bd=dbConnect();
    $req=$bd->prepare("SELECT * FROM abonne WHERE nomUtilisateur=?");
    $req->execute(array($nomUtilisateur));
    if($req->fetch()){
      $req->closeCursor();
      return TRUE;
    }
    else{
      $req=$bd->prepare("SELECT * FROM agence WHERE nomUtilisateur=?");
        if($req->fetch()){
        $req->closeCursor();
        return TRUE;
      return FALSE;
    }

  }
}


// Creait un agence dans la base de donnée
 function registerAgence($nomAgence, $adresse,  $email, $nomUtilisateur, $motDePasse){
   $bd=dbConnect();
   $req=$bd->prepare("INSERT INTO agence(nomAgence, adresse, email,  nomUtilisateur, motDePasse) VALUES (?, ?, ?, ?, ?)");
   $req->execute(array($nomAgence, $adresse,  $email, $nomUtilisateur, password_hash($motDePasse, PASSWORD_DEFAULT)));
   $req->closeCursor();

 }

 function loginUserAfterRegister($nomUtilisateur){
   $db=dbConnect();
   $req=$db->prepare("SELECT id,  nomUtilisateur FROM agence WHERE nomUtilisateur=? ");
   $req->execute(array($nomUtilisateur));
   if ($agence=$req->fetch()){
     $req->closeCursor();
       return $agence;
 }
 }
function updateAgence($idAgence, $nomAgence, $adresse, $email, $telephone1, $telephone2, $logo){
  $db=dbConnect();
  $req=$db->prepare("UPDATE agence SET nomAgence=?, adresse=?, email=?, telephone1=?, telephone2=?, logo=? WHERE id=?");
  $req->execute(array($nomAgence, $adresse, $email, $telephone1, $telephone2,  $logo, $idAgence));
}

function getAgence($idAgence){
  $db=dbConnect();
  $req=$db->prepare("SELECT * FROM agence WHERE id=? ");
  $req->execute(array($idAgence));
  if ($agence=$req->fetch()){
    $req->closeCursor();
      return $agence;
}
}
