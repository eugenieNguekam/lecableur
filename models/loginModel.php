<?php include "../controllers/accessPage.php"; ?>
<?php
  include "dbConnexion.php";

  //Connexion du cableur;
  function loginUser($nomUtilisateur, $motDePasse){
    $db=dbConnect();
    $req=$db->prepare("SELECT id,  nomUtilisateur, motDePasse FROM abonne WHERE nomUtilisateur=? ");
    $req->execute(array($nomUtilisateur));
    if ($user=$req->fetch()){
      $req->closeCursor();
      if(password_verify($motDePasse, $user["motDePasse"])){
        $user["status"]="abonne";
        return $user;
      }

      else
      return FALSE;

    }
    else{
      $req=$db->prepare("SELECT id, nomUtilisateur, motDePasse FROM agence WHERE nomUtilisateur=?");
      $req->execute(array($nomUtilisateur));
      if ($user=$req->fetch()){
        $req->closeCursor();
        if(password_verify($motDePasse, $user["motDePasse"])){
          $user["status"]="agence";
          return $user;
        }

        else
        return FALSE;

      }
    else{
      return FALSE;
    }

  }
}
