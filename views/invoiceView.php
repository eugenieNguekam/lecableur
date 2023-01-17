
<?php include "../controllers/accessPage.php"; ?>
<?php ob_start(); ?>
<title>Liste abonnées</title>
<link rel="stylesheet" href="../publics/css/invoice.css">
<?php $header=ob_get_clean(); ?>


<?php ob_start(); ?>
<div class="mt-3 ">
     <h3 class=""><i style="color:#716f95"></i> </h3>


  <div class="row offset-sm-4 list">

      <h4 class="col-sm-4 text-center pt-3 text-transform-uppercase">Liste des factures</h4>

      </form>
      <div class="col-sm-3"></div>
  </div>
 <div class="container-fluid">
   <div class="row">
     <div class="col-12 col-md-9">
       <table class="table table-striped table-sm table-bordered ">
           <thead class="thead-dark">
               <tr>
                   <th>Numéro de Facture</th>
                   <th>Montant</th>
                   <th>Reste à payer</th>
                   <th>Date de délai payement</th>
                   <th>Actions</th>

               </tr>
           </thead>
          <?php
           while ($data = $req->fetch())
           {
           ?>
               <tbody>
                   <tr>
                       <td><?php echo $data['numFacture'] ?></td>
                       <td><?php echo $data['montant'] ?> FCFA</td>
                       <td><?php echo $data['resteAPayer'] ?>  FCFA</td>
                       <td><?php echo $data['dateDelai'] ?></td>

                       <td>

                           <a href="../controllers/readInvoice.php?id=<?php echo $data['id'] ?>"><i class="bi bi-info-circle-fill" style="color:#b7b2fb;"></i></a>

                       </td>
                   </tr>
               <?php
           }
           $req->closeCursor();
               ?>
               </tbody>
       </table>
     </div>
     <div class="col-12 col-md-3">
         <form class="" action="../controllers/invoice.php" method="get">
           <div class="d-flex">
             <div class="">
               <input class="form-control" id="number" type="search" name="number" value="<?php if (isset($_GET["number"])) echo htmlspecialchars($_GET["number"]) ?>" placeholder="Numéro de facture">
             </div>
             <div class="">
               <button type="submit" class="btn ml-3" name="button" style="  background: #b7b2fb;"><i class="bi bi-search"></i>
              </button>
             </div>
           </div>


         </form>

         <div class="mt-3 filter">
           <h5>Filtrer par</h5>
           <ul>

            <li class="mt-2 <?php if(isset($_GET["filter"])){if($_GET["filter"]=="1") echo "active";} ?>"><a href="../controllers/invoice.php?filter=1" class="text-decoration-none">Non réglées avant délai</a> </li>
            <li class="mt-2  <?php if(isset($_GET["filter"])){if($_GET["filter"]=="2") echo "active";} ?>"><a href="../controllers/invoice.php?filter=2" class="text-decoration-none">Non reglées après délai</a> </li>
            <li class="mt-2  <?php if(isset($_GET["filter"])){if($_GET["filter"]=="3") echo "active";} ?>"><a href="../controllers/invoice.php?filter=3" class="text-decoration-none">Non réglées</a> </li>
            <li class="mt-2  <?php if(isset($_GET["filter"])){if($_GET["filter"]=="4") echo "active";} ?>"><a href="../controllers/invoice.php?filter=4" class="text-decoration-none"> Réglées</a> </li>
            <li class="mt-2  <?php if(isset($_GET["filter"])){if(!in_array($_GET["filter"], array("1", "2", "3", "4"))) echo "active";} ?>"><a href="../controllers/invoice.php?filter=5" class="text-decoration-none"> Tout</a> </li>
           </ul>
         </div>
     </div>
   </div>
   </div>
 </div>

<?php
  if($count==0){
    ?>
    <div class="mt-5 pt-5 text-center">
        <i class="display-4 " style="color:#b7b2fb;">Aucune facture existante...</i>
    </div>

    <?php
  }
 ?>

<?php $content=ob_get_clean(); ?>

<?php ob_start(); ?>
<script type="text/javascript" src="../publics/js/app.js"></script>
<?php $footer=ob_get_clean(); ?>

<?php include "baseView.php" ?>
