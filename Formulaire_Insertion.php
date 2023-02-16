<?php
include("page_de_connexion.php");
include("header.php");
?>
<section style="min-height:calc(100vh - 112px)">
    <div class="container p-3 mb-2 bg-white text-dark rounded my-4">

        <form action="Traitement_Insertion.php" method="post">
            <h1 class="mb-3 ms-1 row">Ajouter un livre</h1>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Titre du livre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" type="text" name="ident[]" placeholder="Saisissez le titre d'un livre" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Auteur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" type="text" name="ident[]" placeholder="Saisissez l'auteur" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Editeur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" type="text" name="ident[]" placeholder="Saisissez l'éditeur" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Année</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" type="number" pattern="^[0-9]{4}" name="ident[]" placeholder="Saisissez l'année" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nombre de pages</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" type="number" name="ident[]" placeholder="Saisissez le nombre de pages" required>
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