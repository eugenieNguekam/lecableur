
<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>Modifier un abonné</title>
<?php $header=ob_get_clean(); ?>

<?php ob_start(); ?>
<div class=" mt-5 row">
  <div class="col-0 col-md-3">

  </div>
  <div class=" px-5 pb-3  col-12 col-md-8 rounded shadow bg-gray" >
    <div class="mt-4">
      <span class="font-weight-bold" style="font-size:25px;">Nom:  </span> <span style="font-size:20px"><?php if (isset($subscribed["nom"])) echo $subscribed["nom"]; ?></span>
    </div>
    <div class="mt-4">
      <span class="font-weight-bold" style="font-size:25px;">Prenom:  </span> <span style="font-size:20px"><?php if (isset($subscribed["prenom"])) echo $subscribed["prenom"]; ?></span>
    </div>
    <div class="mt-4">
      <span class="font-weight-bold" style="font-size:25px;">Adresse:  </span> <span style="font-size:20px"><?php if (isset($subscribed["email"])) echo $subscribed["email"]; ?></span>
    </div>
    <div class="mt-4">
      <span class="font-weight-bold" style="font-size:25px;">Telephone:  </span> <span style="font-size:20px"><?php if (isset($subscribed["telephone"])) echo $subscribed["telephone"]; ?></span>
    </div>
    <div class="mt-4">
      <span class="font-weight-bold" style="font-size:25px;"><a href="" class="text-secondary">Abonnement: </a> </span> <span style="font-size:20px"></span>
    </div>
    <div class="mt-4">
      <span class="font-weight-bold" style="font-size:25px;"><a href="../controllers/invoice.php?idAbonne=<?php echo $subscribed["id"] ?>" class="text-secondary">Factures: </a> </span> <span style="font-size:20px"></span>
    </div>

  </div>
  <div class="col-0 col-md-1">

  </div>
</div>
<div class="d-flex justify-content-center align-item-center mt-5">
  <a href="../controllers/updateSubscribed?id=<?php if(isset($subscribed["id"])) echo $subscribed["id"] ?>" class="btn  mr-2 mr-sm-5" style="background:#b7b2fb;">Modifier</a>
  <a href="../controllers/deleteSubscribed?id=<?php if(isset($subscribed["id"])) echo $subscribed["id"] ?>" class="btn btn-danger ">supprimer</a>
</div>
<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>


<?php $footer=ob_get_clean(); ?>

<?php include "baseView.php" ?>
