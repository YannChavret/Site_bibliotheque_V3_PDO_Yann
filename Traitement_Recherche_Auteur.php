<?php

session_start();
require_once "twig.php";
include("page_de_connexion.php");

$auteur = $_POST['auteur'];

$connex = Connexion("MyDB2");

$requete = $connex->prepare("SELECT * FROM Livres WHERE `Auteur`=:auteur ");
$requete->bindValue(':auteur', $auteur);
$requete->execute();


$twig->display("Affichage_Livres.html.twig", ["livres" => $requete->fetchAll(PDO::FETCH_OBJ), "Titre" => "Le(s) livre(s) de $auteur"]);
