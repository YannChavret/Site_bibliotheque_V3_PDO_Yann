<?php
session_start();
include("page_de_connexion.php");
require_once "twig.php";

$connex = Connexion("MyDB2");
$ID = $_GET["id"];
try {
    $requete = $connex->prepare("SELECT * FROM `Livres` WHERE `ID`= '$ID'");
    $requete->execute();
    $obj = $requete->fetch(PDO::FETCH_ASSOC);
    $twig->display("Formulaire_Insert_Modif.html.twig", $obj);
} catch (Exception $e) {
    var_dump($e);
    echo "<script type=text/javascript>";
    echo "alert('Insertion impossible')</script>";
    die;
}
