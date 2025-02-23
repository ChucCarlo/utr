<?php
session_start();
$_SESSION['compra_realizada'] = true;
echo "success"; // Respuesta para AJAX
?>
