<?php

session_start();
require_once "twig.php";
include("page_de_connexion.php");

$twig->display("Formulaire_Insert_Modif_Fournisseur.html.twig");
