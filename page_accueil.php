<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <title>page_accueil</title>
</head>

<?php
include("page_de_connexion.php");
// include("header.php");

session_start();
$_SESSION["nom"] = "";
$_SESSION["prenom"] = "";

if (isset($_POST["login"]) && !empty($_POST["login"])) {
    $log = $_POST["login"][0];
    $pass = $_POST["login"][1];


    $connex = Connexion("MyDB2");

    $requete = $connex->prepare("SELECT * FROM Users WHERE `Login`LIKE BINARY'$log' AND `Mdp`LIKE BINARY'$pass'");
    $requete->execute();
    $obj = $requete->fetch(PDO::FETCH_OBJ);

    $authuser = "";


    if (($obj->Login != $log) && ($obj->Mdp != $pass)) {
        $authuser = "Identifiant ou mot de passe erroné";
    } else {
        $authuser = "";

        $prenom = $obj->Prenom;
        $nom = $obj->Nom;
        $_SESSION["prenom"] = $prenom;
        $_SESSION["nom"] = $nom;

        header("Location: Home.php");
    }
}

?>

<body class="bg-dark text-white">


    <nav class="navbar p-3 mb-2 bg-primary text-white ">
        <div class="container-fluid bg-primary text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
            </svg>
        </div>
    </nav>

    <section style="min-height:calc(100vh - 112px)">
        <div class="container p-3 mb-2 bg-white text-dark rounded my-4">

            <form action="" method=post>
                <h1 class="text-center">Consultation</h1>
                <p>Entrez vos identifiants pour vous connecter :</p>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Identifiant</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Email" name="login[]" placeholder="Saisissez votre identifiant" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="login[]" placeholder="Saisissez votre mot de passe" required>
                    </div>
                    <?php echo "<p class='text-danger'>" . $authuser . "</p>"; ?>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
                <a class="btn btn-outline-primary" href="Formulaire_Inscription.php">Inscrivez-vous</a>
            </form>
        </div>
    </section>
    <?php
    include("footer.php");
    ?>

</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>