<?php
include("page_de_connexion.php");
include("header.php");

$ID = $_GET['id'];

$connex = Connexion("MyDB2");

$requete = $connex->prepare("SELECT * FROM `Fournisseur` WHERE `Id_fournisseur`= '$ID'");
$requete->execute();
$obj = $requete->fetch(PDO::FETCH_OBJ);

?>
<section style="min-height:calc(100vh - 112px)">
    <div class="container p-3 mb-2 bg-white text-dark rounded my-4">

        <form action="Traitement_Modification_Fournisseur.php?id=<?= $ID ?>" method="post">
            <h1 class="mb-3 ms-1 row">Modifier un fournisseur</h1>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Code Fournisseur</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" value="<?= $obj->Code_fournisseur ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Raison Sociale</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" value="<?= $obj->Raison_sociale ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Adresse</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" value="<?= $obj->Rue_fournisseur ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Code Postal</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="ident[]" value="<?= $obj->Code_postal ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Ville</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" value="<?= $obj->Localite ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Pays</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" value="<?= $obj->Pays ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Téléphone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="ident[]" value="<?= $obj->Tel_fournisseur ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Site Web</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" value="<?= $obj->Url_fournisseur ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Mail</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="ident[]" value="<?= $obj->Email_fournisseur ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Fax</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="ident[]" value="<?= $obj->Fax_fournisseur ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary d-grid gap-2 col-4 mx-auto">Valider</button>

        </form>
    </div>
</section>

<?php
include("footer.php");
?>