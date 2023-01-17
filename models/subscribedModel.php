<?php include "../controllers/accessPage.php"; ?>
<?php
    include "dbConnexion.php";
    function getSubscribed($idAgence){
    $db=dbConnect();
    $req = $db->prepare('SELECT * FROM abonne WHERE id_agence=?');
    $req->execute(array($idAgence));
    $req1= $db->prepare('SELECT COUNT(*) AS nombre FROM abonne WHERE id_agence=?');
    $req1->execute(array($idAgence));
    return array($req, $req1);
  }

  function addSubscribed($cni, $nomUtilisateur, $motDePasse,  $nom, $prenom, $adresse, $email, $telephone, $idAgence){
    $db=dbConnect();
    $sql = "INSERT INTO abonne (NumCNI, nomUtilisateur, motDePasse, nom, prenom, adresse, email, telephone, id_agence)
            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)";
    $req = $db->prepare($sql);
    $req->execute(array($cni,$nomUtilisateur,  password_hash($motDePasse, PASSWORD_DEFAULT), $nom, $prenom, $adresse, $email, $telephone, $idAgence));
  }


  function verifyUniqueSubscribed($cni, $idAgence){
    $bd=dbConnect();
    $req=$bd->prepare("SELECT * FROM abonne WHERE NumCNI=? AND id_agence=?");
    $req->execute(array($cni, $idAgence));
    if($req->fetch()){
      $req->closeCursor();
      return TRUE;
    }
    else{
      return FALSE;
    }

  }

function getOneSubscribed($id, $idAgence){
  $bd=dbConnect();
  $req=$bd->prepare("SELECT * FROM abonne WHERE id=? AND id_agence=?");
  $req->execute(array($id, $idAgence));
  if($subscribed=$req->fetch()){
    return $subscribed;
  }
  else{
    return FALSE;
  }
}

function  updateSubscribed($cni, $nom, $prenom, $adresse, $email, $telephone, $oldCni){

  $db=dbConnect();
  $req=$db->prepare("UPDATE abonne SET NumCNI=?, nom=?, prenom=?, adresse=?, email=?, telephone=? WHERE NumCNI=? ");
  $req->execute(array($cni, $nom, $prenom, $adresse,  $email, $telephone, $oldCni));

}

function deleteSubscribed($id, $idAgence){
  $db=dbConnect();
  $req=$db->prepare("DELETE FROM abonne WHERE id=? AND id_agence=?");
  $req->execute(array($id, $idAgence));
}

function getLastIdAbonne(){
  $db=dbConnect();
  $req=$db->query("SELECT MAX(id) FROM abonne ");
  $max=$req->fetch();
  print_r($max);
  return $max[0];
}
