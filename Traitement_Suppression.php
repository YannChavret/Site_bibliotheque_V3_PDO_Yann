<?php
session_start();
require_once "twig.php";
include("page_de_connexion.php");

$ID = $_GET['id'];


$connex = Connexion("MyDB2");
try {
    $requete = $connex->prepare("DELETE FROM `Livres` WHERE `ID`= :ID");
    $requete->bindValue(':ID', $ID);
    $requete->execute();
    $obj = $requete->fetch(PDO::FETCH_OBJ);
} catch (Exception $e) {

    echo "<script type=text/javascript>";
    echo "alert('Suppression impossible')</script>";
    die;
}
echo "<script type=text/javascript>";
echo "alert('Suppression réussie')</script>";



echo "<script type=\"text/javascript\">";
echo "window.location.href='Affichage_Livres.php'";
echo "</script>";
