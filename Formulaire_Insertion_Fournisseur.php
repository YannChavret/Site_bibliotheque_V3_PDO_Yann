<?php
include("page_de_connexion.php");
include("header.php");
?>
<section style="min-height:calc(100vh - 112px)">
    <div class="container p-3 mb-2 bg-white text-dark rounded my-4">

        <form action="Traitement_Insertion_Fournisseur.php" method="post">
            <h1 class="mb-3 ms-1 row">Ajouter un fournisseur</h1>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Code Fournisseur</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" placeholder="Saisissez un code fournisseur" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Raison Sociale</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" placeholder="Saisissez la raison sociale" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Adresse</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" placeholder="Saisissez l'adresse" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Code Postal</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="ident[]" placeholder="Saisissez le code postal" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Ville</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" placeholder="Saisissez la ville" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Pays</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" placeholder="Saisissez la ville" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Téléphone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="ident[]" placeholder="Saisissez le numéro de téléphone" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Site Web</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="ident[]" placeholder="Saisissez l'URL du site web" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Mail</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="ident[]" placeholder="Saisissez le mail" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Fax</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="ident[]" placeholder="Saisissez le numero de fax" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary ">Valider</button>
                <button type="reset" class="btn btn-outline-danger ">Effacer</button>
            </div>
        </form>
    </div>

</section>
<?php
include("footer.php");
?>