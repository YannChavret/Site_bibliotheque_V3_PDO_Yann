<?php
session_start();
require_once "twig.php";
include("page_de_connexion.php");


$pays = $_POST['pays'];

$connex = Connexion("MyDB2");

$requete = $connex->prepare("SELECT * FROM Fournisseur WHERE `Pays`=:pays ");
$requete->bindValue(':pays', $pays);
$requete->execute();

$twig->display("Affichage_Fournisseurs.html.twig", ["fournisseurs" => $requete->fetchAll(PDO::FETCH_OBJ), "Titre" => "Le(s) fournisseur(s) situé(s) en $pays"]);
