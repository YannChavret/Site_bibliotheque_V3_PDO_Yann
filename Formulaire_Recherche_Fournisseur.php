<?php
include("page_de_connexion.php");
include("header.php");

?>
<section style="min-height:calc(100vh - 112px)">
    <div class="container p-3 mb-2 bg-white text-dark rounded my-4">


        <form class="mb-3" action="Traitement_Recherche_Fournisseur_Ville.php" method="post">
            <h1 class="mb-3 ms-1 row">Rechercher un fournisseur</h1>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Recherche par ville</label>
                <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="ville" placeholder="Saisissez la ville">
                        <option value="" selected="true">Choisir une ville</option>
                        <?php
                        $connex = Connexion("MyDB2");

                        $requete = $connex->prepare("SELECT DISTINCT `Localite` FROM Fournisseur");
                        $requete->execute();

                        while ($obj = $requete->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <option value="<?= $obj->Localite ?>"><?= $obj->Localite ?></option>
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
        <form action="Traitement_Recherche_Fournisseur_Pays.php" method="post">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Recherche par pays</label>
                <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="pays" placeholder="Saisissez le pays">
                        <option value="" selected="true">Choisir un pays</option>
                        <?php
                        $connex = Connexion("MyDB2");

                        $requete = $connex->prepare("SELECT DISTINCT `Pays` FROM Fournisseur");
                        $requete->execute();

                        while ($obj = $requete->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <option value="<?= $obj->Pays ?>"><?= $obj->Pays ?></option>
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