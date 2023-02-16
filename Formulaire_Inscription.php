<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>formulaire_Inscription</title>
</head>

<?php
include("page_de_connexion.php");
// include("header.php");


if (isset($_POST["register"]) && !empty($_POST["register"])) {
    $nom = strtoupper($_POST["register"][0]);
    $prenom = ucwords(strtolower($_POST["register"][1]));
    $age = ($_POST["register"][2]);
    $ville = ucwords(strtolower($_POST["register"][3]));
    $login = ($_POST["register"][4]);
    $mdp = ($_POST["register"][5]);
    $mdpConfirmed = ($_POST["register"][6]);

    $connex = Connexion("MyDB2");

    $requete = $connex->prepare("SELECT * FROM Users WHERE Login='$login'");
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

        if ($mdp != $mdpConfirmed) {

            // echo "<script type=text/javascript>";
            // echo "alert('Veuillez confimer le mot de passe')</script>";
            // echo "<script type=\"text/javascript\">";
            // echo "window.history.back();";
            // echo "</script>";
            $matchMdp = "Veuillez confimer le mot de passe";
        } else {
            $requete = $connex->prepare("INSERT INTO Users (`Nom`, `Prenom`, `Age` `Ville`, `Login`, `Mdp`)
        VALUES('$nom','$prenom','$age','$ville','$login','$mdp')");
            $requete->execute();
            $obj = $requete->fetch(PDO::FETCH_OBJ);
            if (!$obj) {
                echo "<script type=text/javascript>";
                echo "alert('Inscription impossible')</script>";
            } else {
                echo "<script type=text/javascript>";
                echo "alert('Inscription réussie')</script>";
                header("Location: page_accueil.php");
            }
        }
    }
} else {
    // echo "<script type=\"text/javascript\">";
    // echo " alert('Saisissez tous les champs !');";
    // echo "</script>";
    // $missingValue = "Veuillez saisir tous les champs !";

}
?>



<body class="bg-dark text-white">
    <section style="min-height:calc(100vh - 112px)">

        <nav class="navbar p-3 mb-2 bg-primary text-white ">
            <div class="container-fluid bg-primary text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                </svg>
            </div>
        </nav>


        <div class="container p-3 mb-2 bg-white text-dark rounded my-4">

            <form action="" method=post>
                <h1 class="text-center">Consultation</h1>
                <p>Entrez vos informations pour créer un compte :</p>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="register[]" placeholder="Saisissez votre nom" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Prénom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="register[]" placeholder="Saisissez votre prénom" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Age</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="register[]" placeholder="Saisissez votre âge" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Ville</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="register[]" placeholder="Saisissez votre ville" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nom utilisateur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="register[]" placeholder="Saisissez votre nom" required>
                    </div>
                </div>
                <?php echo "<p class='text-danger'>" . $userRegistering . "</p>"; ?>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="register[]" placeholder="Saisissez votre mot de passe" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Confirmez le mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPasswordConfirmed" name="register[]" placeholder="Saisissez à nouveau votre mot de passe" required>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Utilisateur
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Administrateur
                    </label>
                </div>
                <?php echo "<p class='text-danger'>" . $matchMdp . "</p>"; ?>
                <?php echo "<p class='text-danger'>" . $missingValue . "</p>"; ?>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>

    </section>
    <?php
    include("footer.php");
    ?>