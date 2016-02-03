<?php

if(isset( $_SESSION['est'] )) {
  http_redirect('matriculacion.php');
}

$msg = (isset($_GET['exito']) ? $_GET['exito'] : '');