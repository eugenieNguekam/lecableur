<?php
include "session.php";
include "defineAccess.php";
include "../models/subscriptionModel.php";
$menu=3;
$idAgence=$_SESSION["id"];
$typesSubscriptions=getTypesSubscriptions($idAgence);
include "../views/subscriptionView.php";
