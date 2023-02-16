<?php
include("page_de_connexion.php");
include("header.php");
?>

<section style="min-height:calc(100vh - 112px)">
    <h1 class="container p-3 mb-2">Résultat de la recherche</h1>

    <?php

    $auteur = $_POST['auteur'];

    $connex = Connexion("MyDB2");

    $requete = $connex->prepare("SELECT * FROM Livres WHERE `Auteur`=:auteur ");
    $requete->bindValue(':auteur', $auteur);
    $requete->execute();

    ?>



    <div class="container bg-white text-dark rounded">
        <h5 class="container p-3 mb-2 "><?= $nb ?> livre(s) de <?= $auteur ?> disponible(s)</h5>
        <table class="table p-3 mb-2 bg-white text-dark rounded my-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Editeur</th>
                    <th scope="col">Année</th>
                    <th scope="col">Nombre de pages</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <?php
            while ($obj = $requete->fetch(PDO::FETCH_OBJ)) {
            ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $obj->ID ?></th>
                        <td><?= $obj->Nom ?></td>
                        <td><?= $obj->Auteur ?></td>
                        <td><?= $obj->Editeur ?></td>
                        <td><?= $obj->Annee ?></td>
                        <td><?= $obj->NombreDePages ?></td>
                        <td><a href="Formulaire_Modification.php?id=<?= $obj->ID ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></a></td>
                        <td><a href="Traitement_Suppression.php?id=<?= $obj->ID ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                </svg></a></td>
                    </tr>
                <?php
            }
                ?>
                </tbody>
        </table>

    </div>
</section>


<?php
include("footer.php");
?>