<?php

include("page_de_connexion.php");



session_start();
require_once "twig.php";

$twig->display("Home.html.twig");
