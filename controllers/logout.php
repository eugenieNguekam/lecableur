<?php
session_start();
include "defineAccess.php";
$_SESSION=array();
header("Location:"."login.php");
