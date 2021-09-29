<?php

session_start();

unset($_SESSION["ventas"]);
$_SESSION["ventas"] = [];

header("Location: ./ventas.php?status=5");
?>
