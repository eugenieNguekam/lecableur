
<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>Facture</title>
<link rel="stylesheet" href="../publics/css/add-type-subscription.css" type="text/css">
<?php $header=ob_get_clean(); ?>


<?php ob_start(); ?>
<div class="container-fluid">
  <h3 class=""><i style="color:#716f95"></i></h3>
     <h3 class="text-center">Facture</h3>
  <div class="row mt-5">
    <div class="col-0 col-md-3">

    </div>
      <div class="col-12 col-md-8">
        <div class=" px-5 py-3 shadow rounded facture bg-gray">
            <div class="mt-3">
              <span>Numéro de facture: </span><span><?php echo $invoice["numFacture"] ?></span>
            </div>
            <div class="mt-3">
              <span>Libellé: </span><span><?php echo $invoice["libelleFacture"] ?></span>
            </div>
            <div class="mt-3">
              <span>Montant: </span><span><?php echo $invoice["montant"] ?> FCFA</span>
            </div>
            <div class="mt-3">
              <span>Reste à payer: </span><span><?php echo $invoice["resteAPayer"] ?> FCFA</span>
            </div>
            <div class="mt-3">
              <span>Date de delai: </span><span><?php echo $invoice["dateDelai"] ?></span>
            </div>
            <div class="mt-3">
              <a href="../controllers/readSubscription.php?id=<?php echo $invoice["idAbonnement"] ?>">Abonnement</a>
            </div>
            <div class="mt-4 d-flex">
              <a href="../controllers/loadInvoice.php?id=<?php echo $invoice["id"] ?>" name="button" class="btn mr-2" style="background: #b7b2fb;">Générer la facture</a>
              <a href="" name="button" class="btn-payment btn ml-2" style="background: #b7b2fb;">Regler maintenant</a>

            </div>

        </div>

        <div class="my-5 shadow rounded bg-gray px-5 py-3 payment <?php if(!isset($_POST["price"])) echo "d-none"; ?>">
            <form action="../controllers/addPayment.php" method="post">
              <div>
                <label for="price">Montant: </label>
                <input type="text" name="price" id="price" value="<?php if (isset($_POST["price"])) echo $_POST["price"]; ?>" class="form-control" required >
                <small class="text-danger"><?php if(isset($form_errors["price"])) echo $form_errors["price"]; ?></small>
              </div>
              <div>
                <input hidden type="text" name="id" value="<?php echo $invoice["id"] ?> " required>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn "  style="background: #b7b2fb;">Regler</button>
              </div>

            </form>
        </div>
      </div>

      <div class="col-0 col-md-1">

      </div>
  </div>
</div>
<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>
<script type="text/javascript" src="../publics/js/payment.js"></script>




<?php $footer=ob_get_clean(); ?>

<?php include "baseView.php" ?>
