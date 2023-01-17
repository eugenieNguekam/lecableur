<?php include "../controllers/accessPage.php"; ?>
<nav class="navbar navbar-light navStyle  ">

    <h1 class="navbar-brand offset-md-5 font-weight-bolder text-white">TV CABLE</h1>
    <!--<h1 class="navbar-brand  font-weight-bolder text-white">TV CABLE</h1>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="toggle navigation">
        <span class="navbar-toggler-icon styleIcon"></span>
    </button>

    <div class="collapse navbar-collapse ml-2" id="navbarText">
        <ul class="navbar-nav  navbar-nav-scroll">
            <li class="nav-item <?php if(isset($menu)){if($menu==1) echo "active";} ?> ">

                <a href="../controllers/home.php" class="nav-link" role="button ">
                  <i class="bi bi-house-door-fill"></i> <span class="">Acceuil</span>
                </a>
            </li>
            <li class="nav-item <?php if(isset($menu)){if($menu==2) echo "active";} ?> ">

                <a href="../controllers/subscribedList.php" class="nav-link" role="button">
                  <i class="bi bi-person-fill"></i> <span class="">Abonnés</span>
                </a>
            </li>
            <li class="nav-item  <?php if(isset($menu)){if($menu==3) echo "active";} ?> ">

                <a href="../controllers/subscription.php" class="nav-link" role="button">
                  <i class="bi bi-calendar"></i> <span class="">Abonnements</span>
                </a>
            </li>
            <li class="nav-item  <?php if(isset($menu)){if($menu==4) echo "active";} ?> ">

                <a href="../controllers/invoice.php" class="nav-link" role="button">
                  <i class="bi bi-file-text"></i> <span class="">Factures</span>
                </a>
            </li>

            <li class="nav-item <?php if(isset($menu)){if($menu==6) echo "active";} ?> ">
              <a href="../controllers/count.php" class="nav-link">Mon Compte</a>
             </li>
        </ul>

    </div>

</nav>
