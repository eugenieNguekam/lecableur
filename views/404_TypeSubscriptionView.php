
<?php ob_start(); ?>
<title>Liste abonnées</title>
<?php $header=ob_get_clean(); ?>


<?php ob_start(); ?>
<div class="mt-5 d-flex justify-content-center align-items-center">
  <div class="">
    <h2 class="text-dark pt-5 fw-bold">L'abonné est introuvable... </h2>
    <a href="../controllers/subscribedList.php" class="btn btn-dark mt-5">Liste des abonnés</a>
  </div>

</div>
<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<?php $footer=ob_get_clean(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>



<?php include "baseView.php" ?>
