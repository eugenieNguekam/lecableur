
<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>ajouter un abonné</title>
<?php $header=ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="container">
    <!--grid row-->
    <div class="row py-5">
      <div class="col-0 col-md-2">

      </div>
        <!--grid column-->
        <div class="col-12 col-md-10">
           <h3 class="text-center">Ajouter un abonné</h3>
            <!--form-->
            <form action="../controllers/addSubscribed.php" class="bg-gray rounded" method="POST" id="loginForm">
                <div class=" px-5 py-3 shadow r ">
                    <div class="">

                        <div>
                          <label for="cni">Numéro de CNI</label>
                            <input type="text" placeholder="" id="cni" name="cni" class=" form-control" value="<?php if(isset($_POST["cni"])) echo $_POST["cni"]; ?>" required minlength="9" maxlength="9">
                            <small class="text-danger"><?php if(isset($errors_form["cni"])) echo $errors_form["cni"]; ?></small>
                        </div>
                        <div>
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" class="mt-2 form-control " required value="<?php if(isset($_POST["nom"])) echo $_POST["nom"]; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["nom"])) echo $errors_form["nom"]; ?></small>
                        </div>
                        <div class="mt-2">
                          <label for="prenom">Prenom</label>
                            <input type="text" id="prenom"  name="prenom" class=" form-control" required value="<?php if(isset($_POST["prenom"])) echo $_POST["prenom"]; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["prenom"])) echo $errors_form["prenom"]; ?></small>
                        </div>
                        <div class="mt-2">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" id="adresse"  class=" form-control" required value="<?php if(isset($_POST["adresse"])) echo $_POST["adresse"]; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["adresse"])) echo $errors_form["adresse"]; ?></small>
                        </div>
                        <div class="mt-2" >
                            <label for="email">Email</label>
                            <input type="text" id="email"  name="email" class="  form-control" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["email"])) echo $errors_form["email"]; ?></small>
                        </div>
                        <div class="mt-2">
                            <label for="telephone">Numéro de téléphone</label>
                            <input type="tel" id="telephone"  class=" form-control" name="telephone" required minlength="9" maxlength="9" value="<?php if(isset($_POST["telephone"])) echo $_POST["telephone"]; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["telephone"])) echo $errors_form["telephone"]; ?></small>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn" style="background:#b7b2fb;">Ajouter</button>
                            <hr class="hr-light mb-3 mt-4">
                        </div>


                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>
<script src="../publics/js/regex.js"></script>

<?php $footer=ob_get_clean(); ?>

<?php include "baseView.php" ?>
