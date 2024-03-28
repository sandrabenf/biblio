<?php
include "header.php";
include "connexion.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le numéro de nationalité à partir du formulaire
    $num = $_POST["num"];

    // Récupérer les informations existantes de la nationalité à modifier
    $query = "SELECT * FROM nationalite WHERE num = :num";
    $statement = $db->prepare($query);
    $statement->bindParam(":num", $num, PDO::PARAM_INT);
    $statement->execute();
    
    if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $libelle = $row["libelle"];
    } else {
        // Gérer le cas où la nationalité n'est pas trouvée
        echo "Nationalité non trouvée.";
        exit();
    }
} else {
    // Gérer le cas où le formulaire n'a pas été soumis correctement
    echo "Erreur lors de la soumission du formulaire.";
    exit();
}

// Vérifier si le formulaire de modification a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modifierNationalite"])) {
    // Récupérer les nouvelles valeurs depuis le formulaire
    $nouveauLibelle = $_POST["nouveauLibelle"];

    // Mettre à jour la nationalité dans la base de données
    $updateQuery = "UPDATE nationalite SET libelle = :nouveauLibelle WHERE num = :num";
    $updateStatement = $db->prepare($updateQuery);
    $updateStatement->bindParam(":nouveauLibelle", $nouveauLibelle, PDO::PARAM_STR);
    $updateStatement->bindParam(":num", $num, PDO::PARAM_INT);

    if ($updateStatement->execute()) {
        // Rediriger vers la page d'origine après la modification
        header("Location: listenationalites.php");
        exit();
    } else {
        // Gérer les erreurs lors de la modification
        echo "Erreur lors de la modification de la nationalité.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la nationalité</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <h2>Modifier la nationalité</h2>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="num" value="<?php echo $num; ?>">
                    <div class="mb-3">
                        <label for="nouveauLibelle" class="form-label">Nouveau Libellé</label>
                        <input type="text" class="form-control" id="nouveauLibelle" name="nouveauLibelle" value="<?php echo $libelle; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="modifierNationalite">Modifier</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php include "footer.php"; ?>
