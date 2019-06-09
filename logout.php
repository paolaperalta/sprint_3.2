<?php
require_once("autoload.php");
session_start();
session_destroy();

setcookie("password","",time()-1);
redirect("index.php");
?>
