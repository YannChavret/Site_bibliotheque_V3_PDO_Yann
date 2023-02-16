<?php
session_start();
$_SESSION["nom"] = "";
$_SESSION["prenom"] = "";
$_SESSION = array();
session_destroy();
echo '<br/> Session détruite !';
// echo "<br/> <a href=\"page_accueil.php\">Retour à l'accueil</a>";
header("Location: page_accueil.php");
