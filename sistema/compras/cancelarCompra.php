<?php

session_start();

unset($_SESSION["compras"]);
$_SESSION["compras"] = [];

header("Location: ./compras.php?status=2");
?>
