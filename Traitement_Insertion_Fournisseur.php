<?php
include("page_de_connexion.php");
include("header.php");

if (isset($_POST["ident"]) && !empty($_POST["ident"])) {
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
        $requete = $connex->prepare("INSERT INTO Fournisseur (`Code_fournisseur`, `Raison_sociale`, `Rue_fournisseur`, `Code_postal`, `Localite`, `Pays`, `Tel_fournisseur`, `Url_fournisseur`, `Email_fournisseur`, `Fax_fournisseur`)
        VALUES(:codeF,:raisonSociale,:adresse,:codePostal,:ville,:pays, :telephone, :siteWeb, :mail, :fax)");
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
echo "window.location.href='Affichage_Fournisseurs.php'";
echo "</script>";

include("header.php");
