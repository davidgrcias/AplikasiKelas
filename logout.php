<?php
require 'function.php';
$_SESSION = [];
session_unset();
session_destroy();
setcookie ("id", "", time() - 10);
setcookie ("key", "", time() - 10);
header("Location: login.php");
?>
