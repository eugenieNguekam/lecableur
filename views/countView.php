
<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>Liste abonnées</title>
<?php $header=ob_get_clean(); ?>


<?php ob_start(); ?>
<div class="">
  <ul style="list-style-type:none;">
    <li class="mt-5"><h3>Ajouter/modifier les informations de l'entreprise </h3>
        <div class="row">
          <div class="col-12 col-sm-6">
            <form action="../controllers/count.php" class="bg-gray" method="POST" enctype="multipart/form-data"  id="loginForm">
                <div class=" px-5 py-3 shadow rounded ">
                    <div class="">

                        <div>
                          <label for="cni">Nom Entreprise</label>
                            <input type="text" placeholder="" id="cni" name="nom-agence" class=" form-control" value="<?php if(isset($agence["nomAgence"])) echo htmlspecialchars($agence["nomAgence"]) ; ?>" required >
                            <small class="text-danger"><?php if(isset($errors_form["nom-agence"])) echo $errors_form["nomAgence"]; ?></small>
                        </div>
                        <div>
                            <label for="nom">Adresse</label>
                            <input type="text" id="nom" name="adresse" class="mt-2 form-control " required value="<?php if(isset($agence["adresse"])) echo htmlspecialchars($agence["adresse"]) ; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["adresse"])) echo  $errors_form["adresse"]; ?></small>
                        </div>
                        <div class="mt-2">
                          <label for="prenom">Email</label>
                            <input type="text" id="prenom"  name="email" class=" form-control" required value="<?php if(isset($agence["email"])) echo htmlspecialchars($agence["email"]) ; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["email"])) echo $errors_form["email"]; ?></small>
                        </div>
                        <div class="mt-2">
                            <label for="adresse">Telephone 1</label>
                            <input type="text" name="telephone-1" id="adresse"  class=" form-control"  value="<?php if(isset($agence["telephone1"])) echo htmlspecialchars($agence["telephone1"]) ; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["telephone-1"])) echo $errors_form["telephone-1"]; ?></small>
                        </div>
                        <div class="mt-2" >
                            <label for="email">Telephone 2</label>
                            <input type="text" id="email"  name="telephone-2" class="  form-control" value="<?php if(isset($agence["telephone2"])) echo htmlspecialchars($agence["telephone2"]) ; ?>">
                            <small class="text-danger"><?php if(isset($errors_form["telephone-2"])) echo $errors_form["telephone-2"]; ?></small>
                        </div>
                        <div class="mt-2 d-flex" >
                          <div>
                          <label for="logo">Logo</label>
                            <input type="file" id="logo"  name="logo" class="  form-control" value="<?php if(isset($agence["logo"])) echo htmlspecialchars( $agence["logo"]); ?>">
                            <small class="text-danger"><?php if(isset($errors_form["logo"])) echo $errors_form["logo"]; ?></small>
                          </div>
                          <div class="mt-3">
                            <?php if($agence["logo"]!=""){
                              ?>
                                <img src="../logos/<?php echo htmlspecialchars($agence["logo"]) ?>" alt="<?php echo htmlspecialchars($agence["nomAgence"] ) ?>"  width="50px" height="50px">
                              <?php
                            }

                            ?>

                          </div>


                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn" style="background:#b7b2fb;">Ajouter</button>
                            <hr class="hr-light mb-3 mt-4">
                        </div>


                    </div>

                </div>
            </form>

          </div>
          <div class="col-0 col-sm-6">

          </div>

        </div>

     </li>

    <li class="mt-5"><a href="../controllers/logout.php" class="text-dark"> Deconnecter</a></li>
  </ul>
</div>

<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<?php $footer=ob_get_clean(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>

<?php include "baseView.php" ?>
