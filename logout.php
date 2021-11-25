<?php
session_start();

unset($_SESSION['usuario']);
unset($_SESSION['Id']);

session_destroy();

header('Refresh: 1; url = index.php');
?>