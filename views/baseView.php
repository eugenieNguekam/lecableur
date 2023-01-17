<?php include "../controllers/accessPage.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publics/css/entete.css">
    <link rel="stylesheet" href="../publics/css/bootstrap.min.css">
    <link rel="stylesheet" href="../publics/css/bootstrap-icons.css">
    <?= $header ?>

</head>

<body class="bg">
    <header>
      <?php include "menuView.php" ?>
    </header>
    <main>
    <?= $content ?>
    </main>
    <script src="../publics/js/jquery-3.6.0.js"></script>
    <script src="../publics/js/bootstrap.bundle.min.js"></script>
    <script src="../publics/js/menu.js"></script>
<!--<script src="../publics/js/regex.js"></script>-->
      <?= $footer ?>
</body>

</html>
