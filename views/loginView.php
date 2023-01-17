<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>Connexion</title>
<?php $header=ob_get_clean(); ?>


<?php ob_start(); ?>
<div class="align-items-center pt-5 bg">
    <!--content-->
    <div class="container">
        <!--grid row-->
        <div class="row mt-5">
            <!--grid column-->
            <div class="col-md-6 pt-5 mt-5">
                <h3>Bienvenue sur notre plateforme!</h3>
                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                <h6 class="">Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Dolores animi, fugit accusamus beatae itaque dolore,
                    deserunt, pariatur commodi in obcaecati veniam ea inventore cupiditate tempora
                    doloribus amet eaque dolorum assumenda.</h6>
            </div>
            <!--grid column-->
            <div class="col-md-6 col-xl-5 ml-5">
                <!--form-->
                <form action="../controllers/login.php" method="POST" id="loginForm">
                    <div class="card shadow rounded border-0">
                        <div class="card-body">
                            <!--Header-->
                            <div class="text-center">
                                <h3 class="white-text">
                                    <i class="fas fa-user white-text"></i>Connectez vous
                                </h3>
                                <hr class="hr-light">
                            </div>
                            <!--body-->
                            <div>

                            </div>
                            <div>
                                <input type="text" placeholder="Entrer votre nom utilisateur" name="nom-utilisateur"
                                    class="mt-2 form-control border-0" value="<?php if(isset($_POST["nom-utilisateur"])) echo $_POST["nom-utilisateur"]; ?>" required>
                                <small class="text-danger"></small>
                            </div>
                            <div class="mt-2">
                                <input type="password" placeholder="Entrer votre mot de passe" name="mot-de-passe"
                                    class="border-0 form-control" value="<?php if(isset($_POST["mot-de-passe"])) echo $_POST["mot-de-passe"]; ?>" required>
                          <i class="text-danger"><?php if(isset($error)) echo $error; ?></i>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit"
                                    class="border-light px-3 py-1 text-black rounded-pill btnForm">Se Connecter</button>

                            </div>
                            <div class="text-right  mt-4 pb-0">
                                <a href="/lecableur/controllers/register.php" class=" text-dark"><i>Vous êtes une agence et vous voulez gerer vos abonnements?? cliquez ici pour vous inscrire</i></a>
                            </div>

                            <hr class="hr-light mb-3">







                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>


<?php $footer=ob_get_clean(); ?>

<?php include "baseView.php" ?>
