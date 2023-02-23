<?php
session_start();
require_once "twig.php";
include("page_de_connexion.php");


$_SESSION["nom"] = "";
$_SESSION["prenom"] = "";

if (isset($_POST["login"]) && !empty($_POST["login"])) {
    $log = $_POST["login"][0];
    $pass = $_POST["login"][1];


    $connex = Connexion("MyDB2");

    $requete = $connex->prepare("SELECT * FROM Users WHERE `Login`LIKE BINARY :log AND `Mdp`LIKE BINARY :pass");
    $requete->bindValue(':log', $log);
    $requete->bindValue(':pass', $pass);
    $requete->execute();
    $obj = $requete->fetch(PDO::FETCH_OBJ);

    $authuser = "";


    if (($obj->Login != $log) && ($obj->Mdp != $pass)) {
        $authuser = "Identifiant ou mot de passe erroné";
    } else {
        $authuser = "";

        $prenom = $obj->Prenom;
        $nom = $obj->Nom;
        $role = $obj->Role;
        $_SESSION["prenom"] = $prenom;
        $_SESSION["nom"] = $nom;
        $_SESSION["admin"] = $role == 0;

        header("Location: Home.php");
    }
}

$twig->display("page_accueil.html.twig", ["authuser" => $authuser]);
