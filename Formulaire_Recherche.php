<?php
include("page_de_connexion.php");
include("header.php");

?>
<section style="min-height:calc(100vh - 112px)">
    <div class="container p-3 mb-2 bg-white text-dark rounded my-4">


        <form class="mb-3" action="Traitement_Recherche_Auteur.php" method="post">
            <h1 class="mb-3 ms-1 row">Rechercher un livre</h1>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Recherche par auteur</label>
                <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="auteur" placeholder="Saisissez l'auteur">
                        <option value="" selected="true">Choisir un auteur</option>
                        <?php
                        $connex = Connexion("MyDB2");

                        $requete = $connex->prepare("SELECT DISTINCT `Auteur` FROM Livres");
                        $requete->execute();
                        $obj = $requete->fetch(PDO::FETCH_OBJ);
                        while ($obj = $requete->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <option value="<?= $obj->Auteur ?>"><?= $obj->Auteur ?></option>
                        <?php
                        }
                        ?>
                    </select>


                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>

            </div>


        </form>
        <form action="Traitement_Recherche_Editeur.php" method="post">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Recherche par éditeur</label>
                <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="editeur" placeholder="Saisissez l'éditeur">
                        <option value="" selected="true">Choisir un éditeur</option>
                        <?php
                        $connex = Connexion("MyDB2");

                        $requete = $connex->prepare("SELECT DISTINCT `Editeur` FROM Livres");
                        $requete->execute();
                        $obj = $requete->fetch(PDO::FETCH_OBJ);
                        while ($obj = $requete->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <option value="<?= $obj->Editeur ?>"><?= $obj->Editeur ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
    </div>

    </div>

</section>


<?php
include("footer.php");
?>