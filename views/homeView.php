
<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>Acceuil</title>
<link rel="stylesheet" href="../publics/css/home.css" type="text/css">
<?php $header=ob_get_clean(); ?>


<?php ob_start(); ?>
<div class="container-fluid pb-5">
  <div class="row mt-5 ">
    <div class="col-12 col-md-6">
      <h1 class="display-4"><i style="color:#716f95"></i> </h1>
      <p style="font-size:20px;">Bienvenue sur la plateforme de gestion des abonnés. </p>
    </div>
    <div class="col-12 col-md-6">

    </div>
  </div>

  <div class="row ml-2">
    <div class="px-2 mt-3 task border border-secondary rounded  shadow col-12 col-md-6">
      <h4>Tâches à éffectuer</h4>
      <ul>
        <li class="mt-4">Enregistrez les informations sur votre entreprise</li>
        <p>Il s'agit des informations particulierements importantes dans l'élaboration des factures</p>
        <a href="../controllers/count.php" class="btn" >enregistrer</a>
        <li class="mt-4">Modelisez vos Offres</li>
        <p>Avant de pouvoir utiliser pleinement la plateforme, il vous faut creer des offres à proposer aux clients</p>
        <a href="../controllers/subscription.php" class="btn" >Modeliser</a>
        <li class="mt-4">Selectionnez les moyens de payements</li>
        <p>
          Selectionnez les moyens de payement que vos clients pourront utiliser payer leur facture.
        </p>
        <a href="" class="btn" >Selectionner</a>
      </ul>
    </div>
    <div class="col-12 col-md-6">

    </div>
  </div>


</div>

<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>

<?php $footer=ob_get_clean(); ?>

<?php include "baseView.php" ?>
