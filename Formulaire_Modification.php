<?php
include("page_de_connexion.php");
include("header.php");

$ID = $_GET['id'];

$connex = Connexion("MyDB2");

$requete = $connex->prepare("SELECT * FROM `Livres` WHERE `ID`= '$ID'");
$requete->execute();
$obj = $requete->fetch(PDO::FETCH_OBJ);

?>
<section style="min-height:calc(100vh - 112px)">
    <div class="container p-3 mb-2 bg-white text-dark rounded my-4">

        <form action="Traitement_Modification.php?id=<?= $ID ?>" method="post">
            <h1 class="mb-3 ms-1 row">Modifier un livre</h1>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Titre du livre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" type="text" name="ident[]" value="<?= $obj->Nom ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Auteur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" type="text" name="ident[]" value="<?= $obj->Auteur ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Editeur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" type="text" name="ident[]" value="<?= $obj->Editeur ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Année</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" type="text" name="ident[]" value="<?= $obj->Annee ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombre de pages</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" type="text" name="ident[]" value="<?= $obj->NombreDePages ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary d-grid gap-2 col-4 mx-auto">Valider</button>

        </form>
    </div>
</section>

<?php
include("footer.php");
?>