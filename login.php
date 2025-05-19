<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");  // Cambia a la página donde haces login
exit;
?>