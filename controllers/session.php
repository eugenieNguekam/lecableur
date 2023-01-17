<?php session_start();
  //print_r($_SESSION);
if (!isset($_SESSION["id"], $_SESSION["nom-utilisateur"], $_SESSION["status"])){
     if($_SERVER["PHP_SELF"]!="/lecableur/controllers/login.php")
       header("Location:"."/lecableur/controllers/login.php");

}
else{

if($_SESSION["status"]!="agence"){
    header("Location:"."accessPage.php", true, 301);
}
}
