<?php

function Connexion($bd)
{
    $dns = "mysql:host=localhost;dbname=$bd";

    $connex = new PDO($dns, 'root', '');
    $connex->query("SET NAMES 'utf8'");
    $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $connex;
}
