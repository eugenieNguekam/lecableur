<?php include "../../controllers/accessPage.php"; ?>
<?php
function dbConnect(){
  try{
     $bd=new PDO("mysql:host=localhost;dbname=lecableur;charset=utf8", "root", "",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  }
  catch(Exception $e){
    echo "Error: ".$e.getMessage();
  }
  return $bd;

}
