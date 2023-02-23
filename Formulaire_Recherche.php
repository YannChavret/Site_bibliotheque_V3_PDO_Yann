<?php
include("page_de_connexion.php");
session_start();
require_once "twig.php";

$connex = Connexion("MyDB2");

try {

    $requete = $connex->prepare("SELECT DISTINCT `Auteur` FROM Livres");
    $requete->execute();
    $requete2 = $connex->prepare("SELECT DISTINCT `Editeur` FROM Livres");
    $requete2->execute();
    $twig->display("Formulaire_Recherche.html.twig", [
        "auteur" => $requete->fetchAll(PDO::FETCH_OBJ),
        "editeur" => $requete2->fetchAll(PDO::FETCH_OBJ)
    ]);
} catch (PDOException $e) {
    die('<p>Echec de connexion. Erreur[' . $e->getCode() . ']:  ' . $e->getMessage() . '</p>');
}
