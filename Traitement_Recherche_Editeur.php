<?php
session_start();
require_once "twig.php";
include("page_de_connexion.php");


$editeur = $_POST['editeur'];

$connex = Connexion("MyDB2");

$requete = $connex->prepare("SELECT * FROM Livres WHERE `Editeur`=:editeur ");
$requete->bindValue(':editeur', $editeur);
$requete->execute();

$twig->display("Affichage_Livres.html.twig", ["livres" => $requete->fetchAll(PDO::FETCH_OBJ), "Titre" => "Le(s) livre(s) édité(s) par $editeur"]);
