<?php
session_start();
require_once "twig.php";
include("page_de_connexion.php");

if (isset($_POST["ident"]) && !empty($_POST["ident"])) {
    $titre = ucwords(strtolower($_POST["ident"][0]));
    $auteur = ucwords(strtolower($_POST["ident"][1]));
    $editeur = ucwords(strtolower($_POST["ident"][2]));
    $annee = ($_POST["ident"][3]);
    $nbPages = ($_POST["ident"][4]);

    $connex = Connexion("MyDB2");
    try {
        $requete = $connex->prepare("INSERT INTO Livres (Nom, Auteur, Editeur, Annee, NombreDePages)
        VALUES(:titre,:auteur,:editeur,:annee,:nbPages)");
        $requete->bindValue(':titre', $titre);
        $requete->bindValue(':auteur', $auteur);
        $requete->bindValue(':editeur', $editeur);
        $requete->bindValue(':annee', $annee);
        $requete->bindValue(':nbPages', $nbPages);
        $requete->execute();
        $obj = $requete->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {

        echo "<script type=text/javascript>";
        echo "alert('Insertion impossible')</script>";
        die;
    }
    echo "<script type=text/javascript>";
    echo "alert('Insertion réussie')</script>";
} else {
    echo "<script type=\"text/javascript\">";
    echo " alert('Saisissez tous les champs !');";
    echo "</script>";
}


echo "<script type=\"text/javascript\">";
echo "window.location.href='Affichage_Livres.php'";
echo "</script>";
