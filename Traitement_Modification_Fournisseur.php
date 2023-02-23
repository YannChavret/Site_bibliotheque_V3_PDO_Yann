<?php
session_start();
require_once "twig.php";
include("page_de_connexion.php");

echo $_GET['id'];

if (isset($_POST["ident"]) && !empty($_POST["ident"])) {
    $ID = $_GET['id'];
    $codeF = ucwords(strtolower($_POST["ident"][0]));
    $raisonSociale = strtoupper($_POST["ident"][1]);
    $adresse = ucwords(strtolower($_POST["ident"][2]));
    $codePostal = ($_POST["ident"][3]);
    $ville = ucwords(strtolower($_POST["ident"][4]));
    $pays = ucwords(strtolower($_POST["ident"][5]));
    $telephone = ($_POST["ident"][6]);
    $siteWeb = ($_POST["ident"][7]);
    $mail = strtolower($_POST["ident"][8]);
    $fax = ($_POST["ident"][9]);

    $connex = Connexion("MyDB2");

    try {
        $requete = $connex->prepare("UPDATE `Fournisseur` SET `Code_fournisseur`=:codeF,`Raison_sociale`=:raisonSociale,`Rue_fournisseur`=:adresse,`Code_postal`=:codePostal,`Localite`=:ville,`Pays`=:pays,`Tel_fournisseur`=:telephone,`Url_fournisseur`=:siteWeb,`Email_fournisseur`=:mail,`Fax_fournisseur`=:fax WHERE `Id_fournisseur`= :ID");
        $requete->bindValue(':codeF', $codeF);
        $requete->bindValue(':raisonSociale', $raisonSociale);
        $requete->bindValue(':adresse', $adresse);
        $requete->bindValue(':codePostal', $codePostal);
        $requete->bindValue(':ville', $ville);
        $requete->bindValue(':pays', $pays);
        $requete->bindValue(':telephone', $telephone);
        $requete->bindValue(':siteWeb', $siteWeb);
        $requete->bindValue(':mail', $mail);
        $requete->bindValue(':fax', $fax);
        $requete->bindValue(':ID', $ID);
        $requete->execute();
        $obj = $requete->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {

        echo "<script type=text/javascript>";
        echo "alert('Modification impossible')</script>";
        die;
    }
    echo "<script type=text/javascript>";
    echo "alert('Modification réussie')</script>";
} else {
    echo "<script type=\"text/javascript\">";
    echo " alert('Saisissez tous les champs !');";
    echo "</script>";
}


echo "<script type=\"text/javascript\">";
echo "window.location.href='Affichage_Fournisseurs.php'";
echo "</script>";
