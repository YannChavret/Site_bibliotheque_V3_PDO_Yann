<?php
session_start();
include("page_de_connexion.php");
require_once "twig.php";

$connex = Connexion("MyDB2");

try {
    $requete = $connex->prepare("SELECT * FROM Fournisseur order by `Raison_sociale`");
    $requete->execute();
    $twig->display("Affichage_Fournisseurs.html.twig", ["fournisseurs" => $requete->fetchAll(PDO::FETCH_OBJ), "Titre" => "Liste des fournisseurs"]);
} catch (PDOException $e) {
    die('<p>Echec de connexion. Erreur[' . $e->getCode() . ']:  ' . $e->getMessage() . '</p>');
}
