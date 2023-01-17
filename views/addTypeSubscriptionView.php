
<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>Ajout type abonnement</title>
<link rel="stylesheet" href="../publics/css/add-type-subscription.css" type="text/css">
<?php $header=ob_get_clean(); ?>


<?php ob_start(); ?>
<div class="container-fluid">
  <h3 class=""><i style="color:#716f95"></i></h3>
     <h3 class="text-center">Creer un type d'abonnment</h3>
  <div class="row mt-5">
    <div class="col-0 col-md-3">

    </div>
      <div class="col-12 col-md-8">
        <form class=" px-5 py-3 shadow rounded bg-gray" action="../controllers/addTypeSubscription.php" method="post">
            <div class="">
              <label for="overview">Libellé</label>
              <input type="text" name="overview" value="<?php if (isset($_POST["overview"])) echo $_POST["overview"]; ?>" class="form-control " id="overview" maxlength="30" required>
              <small class="text-danger"><?php if(isset($errors_form["overview"])) echo $errors_form["overview"]; ?></small>
            </div>
            <div class="mt-4 periodicite">
              <label for="" class="mr-3">périodicité:</label>
              <input type="number" name="periode" value="<?php if (isset($_POST["periode"])) echo $_POST["periode"]; ?>" class="" hidden irequired id="periode">
              <small class="text-danger"><?php if(isset($errors_form["periode"])) echo $errors_form["periode"]; ?></small>
              <?php while($periode=$periodicites->fetch()){
                ?>  <button id-periode="<?php echo $periode["id"] ?>" type="button" name="button" class="btn mr-2"><span class="text-transform-capitalize"><?php echo $periode["nom"] ?></span> </button>
                <?php

              }
               $periodicites->closeCursor();
               ?>
            </div>

            <div class="mt-4">
              <label for="prix">Prix</label>
              <input type="number" name="price" value="<?php if (isset($_POST["price"])) echo $_POST["price"]; ?>" class="form-control " id="price" min="0"  required>
              <small class="text-danger"><?php if(isset($errors_form["price"])) echo $errors_form["price"]; ?></small>
            </div>
            <div class="mt-4 starter-price d-flex ">
              <label for="starter-price" class="mr-3">Prix de demarrage</label>
              <button type="button" name="button " class="btn active mr-2">Non</button>
              <button type="button" name="button " class="btn mr-2">Oui</button>
              <div class=" mr-2 d-none">
                <input type="number" name="starter-price" value="<?php if (isset($_POST["starter-price"])) echo $_POST["starter-price"];  else echo 0;?>" class="form-control " id="stater-price" min="0"  required>
                <small class="text-danger"><?php if(isset($errors_form["starter-price"])) echo $errors_form["starter-price"]; ?></small>
              </div>

            </div>
            <div class="mt-4 finisher-price d-flex">
              <label for="finisher-price" class="mr-3"> prix de resiliation</label>
              <button type="button" name="button" class="btn active mr-2">Non</button>
              <button type="button" name="button" class="btn  mr-2">Oui</button>
              <div class="mr-2 d-none">
                <input type="number" name="finisher-price" value="<?php if (isset($_POST["finisher-price"])) echo $_POST["finisher-price"]; else echo 0;?>" class="form-control " id="finisher-price" min="0"  required>
                <small class="text-danger"><?php if(isset($errors_form["finisher-price"])) echo $errors_form["finisher-price"]; ?></small>
              </div>


            </div>

            <div class="mt-4">
              <label for="prix" class="mr-3"> Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control" required><?php if (isset($_POST["description"])) echo $_POST["description"]; ?></textarea>
              <small class="text-danger"><?php if(isset($errors_form["description"])) echo $errors_form["description"]; ?></small>
            </div>
            <div class="mt-5 ">
              <button type="submit" name="button" class="btn ml-5" style="background:#b7b2fb">Enregistrer</button>
            </div>


        </form>
      </div>

      <div class="col-0 col-md-1">

      </div>
  </div>
</div>
<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>
<script type="text/javascript" src="../publics/js/add-type-subscription.js">

</script>

<?php $footer=ob_get_clean(); ?>

<?php include "baseView.php" ?>
