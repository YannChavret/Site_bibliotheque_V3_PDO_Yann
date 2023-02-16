<?php


// function Connexion($bd)
// {
//     $connex = mysqli_connect("localhost", "root", "", $bd);
//     // if (!$connex) {
//     //     echo "<script type=text/javascript>";
//     //     echo "alert('Connexion impossible à la base de données')</script>";
//     // } else {
//     //     echo "<script type=text/javascript>";
//     //     echo "alert('Connexion réussie à la base de données')</script>";
//     // }
//     return $connex;
// }

function Connexion($bd)
{
    $dns = "mysql:host=localhost;dbname=$bd";

    $connex = new PDO($dns, 'root', '');
    $connex->query("SET NAMES 'utf8'");
    $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $connex;
}
