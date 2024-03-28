<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>




<?php
include "header.php";
include "connexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $libelle = $_POST['libelle'];

    if (!empty($libelle)) {
        $req = $db->prepare("INSERT INTO nationalite(libelle) VALUES(:libelle)");
        $req->bindParam(':libelle', $libelle);
        $nb = $req->execute();

        echo '<div class="container mt-5">';
        echo '<div class="row">';
        echo '<div class="container mt-5">';

        if ($nb == 1) {
            echo '<div class="alert alert-success" role="alert">La nationalité a été ajoutée</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">La nationalité n\'a pas été ajoutée</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Le champ Libellé ne peut pas être vide</div>';
    }
}
?>

<div class="container mt-5">
    <div class="row">
        <h2 class="pt-3 text-center">Ajouter une nationalité</h2>
    </div>

    <div class="container border rounded border-primary p-4">
        <form action="formAjouterNationalite.php" method="POST" class="col-md-6 offset-md-3">

            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé :</label>
                <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <a href="listenationalites.php" class="btn btn-warning btn-block">Revenir à la liste</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success btn-block">Ajouter</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php include "footer.php"; ?>
