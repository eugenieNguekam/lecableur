<?php
use Dompdf\Dompdf;
  require_once "../dompdf/autoload.inc.php";
  $dompdf=new Dompdf();
  $dompdf->loadHtml("Hello TML");
  $dompdf->setPaper("A4","Portrait");
  $dompdf->render();
  $dompdf->stream();
 ?>
