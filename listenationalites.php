<?php
include "header.php";
include "connexion.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<div class="container mt-5 mb-5">
    <div class="row pt-3">

        <div class="col-9">
            <h2>Liste des nationalités</h2>
        </div>

        <div class="col-3">
            <a href="formAjouterNationalite.php" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i> Créer une nationalité</a>
        </div>

        <?php
        $query = "SELECT * FROM nationalite";

        // Exécution de la requête
        $result = $db->prepare($query);
        $result->execute();

        // Vérifier s'il y a des résultats
        if ($result->rowCount() > 0) {
            echo "<table class='table table-striped table-hover'>";
            // Afficher les en-têtes du tableau
            echo "<thead class='thead-dark'><tr><th class='col-md-3'>NUM</th><th class='col-md-6'>LIBELLE</th><th class='col-md-3'>ACTION</th></tr></thead>";

            // Afficher les données de chaque ligne
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["num"] . "</td>";
                echo "<td>" . $row["libelle"] . "</td>";
                echo "<td class='d-flex'>
                        <form method='POST' action='modifierNationalite.php'> 
                            <input type='hidden' name='num' value='" . $row["num"] . "'>
                            <button type='submit' class='btn btn-success me-2'><i class='fa-solid fa-pen'></i></button>
                        </form>
                        <form method='POST' action='supprimerNationalite.php'> 
                            <input type='hidden' name='num' value='" . $row["num"] . "'>
                            <button type='submit' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>
                        </form>
                      </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Aucun résultat trouvé";
        }
        ?>
    </div> <!-- Ajout de la balise de fermeture pour la div row -->

</div> <!-- Ajout de la balise de fermeture pour la div container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include "footer.php"; ?>
