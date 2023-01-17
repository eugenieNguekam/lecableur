<?php include "../controllers/accessPage.php"; ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .container{

        border: solid 2px #b7b2fb;
        padding-right:50px;
        padding-left:50px;
        padding-bottom:150px;
        padding-top:20px;
      }

      .header .facture{
        float:right;
      }
      .client div, .agence div, .client-float div{
        margin-top:5px;
        font-size:12px;
      }
      .client, {
        margin-left:200px;
      }
      .client-float{
        float:left;
      }
      .client{
        float:right;
      }
     .sub-header{
       position:relative;
     }


      .sub-header-client{
        position:absolute;
        top:0;
        right:0;
      }
      .violet{
        color:#b7b2fb;
      }
      .table{
        margin-top:100px;
      }
      .table td, .table th{
        padding-left: 20px;
        padding-right: 20px;
      }
      .table td{
        font-size:13px;
      }
      .table th{
        font-size:14px;
      }
      .sup-header{
        margin-top:40px;
      }

      .sup-header >div{
        border-left: solid 2px #b7b2fb;
        padding-left:20px;
      }
      .header{

      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <div class="facture">
          <h2>Facture n° <?php echo $invoice["numFacture"] ?></h2>
          <h3>Date: <?php echo date("d M Y") ?></h3>
        </div>
        <div class="">
          <?php
          if($agence["logo"]!=""){
            $image="../logos/".$agence["logo"];
            $imageData=base64_encode(file_get_contents($image));
            $src="data:".mime_content_type($image).";base64,".$imageData;
            ?>
          <img src="<?php echo $src  ?>" alt="" width="100px" height="100px">

          <?php
          }

           ?>
          <h1><i> <?php echo $agence["nomAgence"] ?></i></h1>
        </div>

      </div>

      <div class="sub-header">

        <div class="sub-header-agence">
          <div class="agence">
            <h4 class="violet">Agence:</h4>
            <div class="">
              <span>Nom officiel:</span><span><?php echo $agence["nomAgence"] ?></span>
            </div>
            <div class="">
              <span>Adresse:</span><span><?php echo $agence["adresse"] ?></span>
            </div>
            <div class="">
              <span>Email:</span><span><?php echo $agence["email"] ?></span>
            </div>
            <div class="">
              <span>Télephone 1:</span><span><?php echo $agence["telephone1"] ?></span>
            </div>
            <div class="">
              <span>Télephone 2:</span><span><?php echo $agence["telephone2"] ?></span>
            </div>
          </div>

        </div>
        <div class="sub-header-client">
          <div class="client-float">
            <h4 class="violet">FACTURE A</h4>
            <div class="">
              <span>Numéro CNI:</span><span><?php echo $subscribed["NumCNI"] ?></span>
            </div>
            <div class="">
              <span>Nom:</span><span><?php echo $subscribed["nom"] ?></span>
            </div>
            <div class="">
              <span>Prenom:</span><span><?php echo $subscribed["prenom"] ?></span>
            </div>
            <div class="">
              <span>Adresse:</span><span><?php echo $subscribed["adresse"] ?></span>
            </div>
            <div class="">
              <span>Email:</span><span><?php echo $subscribed["email"] ?></span>
            </div>
            <div class="">
              <span>Téléphone:</span><span><?php echo $subscribed["telephone"] ?></span>
            </div>
          </div>
          <div class="client">
            <h4 class="violet">ENVOYE A</h4>
            <div class="">
              <span>Numéro CNI:</span><span><?php echo $subscribed["NumCNI"] ?></span>
            </div>
            <div class="">
              <span>Nom:</span><span><?php echo $subscribed["nom"] ?></span>
            </div>
            <div class="">
              <span>Prenom:</span><span><?php echo $subscribed["prenom"] ?></span>
            </div>
            <div class="">
              <span>Adresse:</span><span><?php echo $subscribed["adresse"] ?></span>
            </div>
            <div class="">
              <span>Email:</span><span><?php echo $subscribed["email"] ?></span>
            </div>
            <div class="">
              <span>Téléphone:</span><span><?php echo $subscribed["telephone"] ?></span>
            </div>
          </div>
        </div>



      </div>


      <div class="table">
        <hr>
        <table>
          <tr>
            <th class="violet">Abonnement souscris</th>
            <th class="violet">Date début</th>
            <th class="violet">Date fin</th>
            <th class="violet">montant</th>
          </tr>
          <tr>
            <td><?php echo $typeSubscription["libelle"] ?></td>
            <td><?php echo $subscription["dateDebut"] ?></td>
            <td><?php echo $subscription["dateFin"] ?></td>
            <td><?php echo $invoice["resteAPayer"] ?> FCFA</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>Net à payer</td>
            <td style="font-weight:bold;"><?php echo $invoice["montant"] ?> FCFA</td>
          </tr>
        </table>
        <hr>
      </div>
      <div class="sup-header">
        <h3><i>A payer avant le <?php echo $invoice["dateDelai"] ?></i> </h3>
        <div class="">
          <h3>Conditions de payement</h3>
           <div class="">
             Payement à la caisse
           </div>
        </div>
      </div>

    </div>
  </body>
</html>
