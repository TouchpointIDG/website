<?php

  session_start();

  if(isset($_GET['file']) && !is_null($_GET['file']) && isset($_GET['type']) && !is_null($_GET['type']))
  {
    $filename = "downloads/" . $_GET['type'] . "/" . $_GET['file'];
    $file = $_GET['file'];

    header("Content-type: application/pdf");
    header("Content-disposition: inline; filename=$file");
    readfile($filename);
  }
  else
  {
    header('Location: https://www.tpidg.us/newsletters/');
  }

 ?>
