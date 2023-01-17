
<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>SUpprimer le type d'abonnement</title>
<?php $header=ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="mt-5  ">
  <div class="d-flex justify-content-center align-items-center">
    <h2 class="px-4"> Voulez vous vraiment supprimer le type d'abonnement?</h2>
  </div>

  <div class="d-flex justify-content-center align-items-center mt-5">
    <a href="../controllers/deleteTypeSubscriptionNO.php?id=<?php if(isset($_GET["id"])) echo $_GET["id"]; ?>" class="btn btn-secondary mr-2 mr-sm-5"> NON</a>
    <a href="../controllers/deleteTypeSubscriptionYES.php?id=<?php if(isset($_GET["id"])) echo $_GET["id"]; ?>" class="btn btn-danger"> OUI</a>
  </div>
</div>

<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>
<script src="../publics/js/regex.js"></script>

<?php $footer=ob_get_clean(); ?>

<?php include "baseView.php" ?>
