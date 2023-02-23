<?php
session_start();
require_once "twig.php";
include("page_de_connexion.php");

$ville = $_POST['ville'];

$connex = Connexion("MyDB2");

$requete = $connex->prepare("SELECT * FROM Fournisseur WHERE `Localite`=:ville ");
$requete->bindValue(':ville', $ville);
$requete->execute();


$twig->display("Affichage_Fournisseurs.html.twig", ["fournisseurs" => $requete->fetchAll(PDO::FETCH_OBJ), "Titre" => "Le(s) fournisseur(s) situé(s) à $ville"]);
