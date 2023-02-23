<?php
session_start();
include("page_de_connexion.php");
require_once "twig.php";

$connex = Connexion("MyDB2");

try {

    $requete = $connex->prepare("SELECT DISTINCT `Localite` FROM Fournisseur");
    $requete->execute();
    $requete2 = $connex->prepare("SELECT DISTINCT `Pays` FROM Fournisseur");
    $requete2->execute();

    $twig->display("Formulaire_Recherche_Fournisseur.html.twig", [
        "ville" => $requete->fetchAll(PDO::FETCH_OBJ),
        "pays" => $requete2->fetchAll(PDO::FETCH_OBJ)
    ]);
} catch (PDOException $e) {
    die('<p>Echec de connexion. Erreur[' . $e->getCode() . ']:  ' . $e->getMessage() . '</p>');
}
