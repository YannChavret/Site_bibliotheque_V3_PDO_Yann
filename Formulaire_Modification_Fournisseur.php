<?php
session_start();
include("page_de_connexion.php");
require_once "twig.php";

$ID = $_GET['id'];

$connex = Connexion("MyDB2");
try {
    $requete = $connex->prepare("SELECT * FROM `Fournisseur` WHERE `Id_fournisseur`= '$ID'");
    $requete->execute();
    $obj = $requete->fetch(PDO::FETCH_ASSOC);
    $twig->display("Formulaire_Insert_Modif_Fournisseur.html.twig", $obj);
} catch (Exception $e) {
    var_dump($e);
    echo "<script type=text/javascript>";
    echo "alert('Insertion impossible')</script>";
    die;
}
