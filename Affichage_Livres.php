<?php
include("page_de_connexion.php");
session_start();
require_once "twig.php";

$connex = Connexion("MyDB2");

try {
    $requete = $connex->prepare("SELECT * FROM Livres order by `Nom`");
    $requete->execute();

    $twig->display("Affichage_Livres.html.twig", ["livres" => $requete->fetchAll(PDO::FETCH_OBJ), "Titre" => "Liste des livres"]);
} catch (PDOException $e) {
    die('<p>Echec de connexion. Erreur[' . $e->getCode() . ']:  ' . $e->getMessage() . '</p>');
}
