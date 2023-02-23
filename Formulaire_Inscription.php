
<?php
include("page_de_connexion.php");
require_once "twig.php";



if (isset($_POST["register"]) && !empty($_POST["register"])) {
    $nom = strtoupper($_POST["register"][0]);
    $prenom = ucwords(strtolower($_POST["register"][1]));
    $age = ($_POST["register"][2]);
    $ville = ucwords(strtolower($_POST["register"][3]));
    $login = ($_POST["register"][4]);
    $mdp = ($_POST["register"][5]);
    $mdpConfirmed = ($_POST["register"][6]);
    $role = ($_POST["register"][7]);

    $connex = Connexion("MyDB2");

    $requete = $connex->prepare("SELECT * FROM Users WHERE Login=:login");
    $requete->bindValue(':login', $login);
    $requete->execute();
    $obj = $requete->fetch(PDO::FETCH_OBJ);

    $userRegistering = "";
    $matchMdp = "";
    $missingValue = "";


    if ($login == $obj->Login) {
        // echo $login;
        // echo "<BR>";
        // echo $donnees[4];
        // echo "<script type=text/javascript>";
        // echo "alert('Veuillez choisir un autre nom utilisateur')</script>";
        // echo "<script type=\"text/javascript\">";
        // echo "window.history.back();";
        // echo "</script>";
        $userRegistering = "Ce nom utilisateur existe déjà, veuillez en choisir un autre";
    } else {
        $userRegistering = "";

        if ($mdp != $mdpConfirmed) {

            // echo "<script type=text/javascript>";
            // echo "alert('Veuillez confimer le mot de passe')</script>";
            // echo "<script type=\"text/javascript\">";
            // echo "window.history.back();";
            // echo "</script>";
            $matchMdp = "Veuillez confimer le mot de passe";
        } else {
            $requete = $connex->prepare("INSERT INTO Users (`Nom`, `Prenom`, `Age`,`Ville`, `Login`, `Mdp`, `Role`)
        VALUES(:nom,:prenom,:age,:ville,:login,:mdp,:role)");
            $requete->bindValue(':nom', $nom);
            $requete->bindValue(':prenom', $prenom);
            $requete->bindValue(':age', $age);
            $requete->bindValue(':ville', $ville);
            $requete->bindValue(':login', $login);
            $requete->bindValue(':mdp', $mdp);
            $requete->bindValue(':role', $role);
            $matchMdp = "";
            try {
                $requete->execute();
                $obj = $requete->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) {

                echo "<script type=text/javascript>";
                echo "alert('Inscription impossible')</script>";
                die("code: " . $e->getCode() . " message " . $e->getMessage());
            }
            echo "<script type=text/javascript>";
            echo "alert('Inscription réussie')</script>";
            header("Location: page_accueil.php");
        }
    }
}
// else {
//     // echo "<script type=\"text/javascript\">";
//     // echo " alert('Saisissez tous les champs !');";
//     // echo "</script>";
//     // $missingValue = "Veuillez saisir tous les champs !";

// }


$twig->display("Formulaire_Inscription.html.twig", [
    "userRegistering" => $userRegistering,
    "matchMdp" => $matchMdp,
    "missingValue" => $missingValue
]);
