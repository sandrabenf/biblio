<?php
include "connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupérer le numéro à partir du formulaire
        $num = $_POST["num"];

        // Préparer et exécuter la requête DELETE
        $query = "DELETE FROM nationalite WHERE num = :num";
        $statement = $db->prepare($query);
        $statement->bindParam(":num", $num, PDO::PARAM_INT);

        if ($statement->execute()) {
            // Afficher une alerte JavaScript avant de rediriger
            echo "<script>
                    alert('La ligne a été supprimée avec succès.');
                    window.location.href = 'listenationalites.php';
                  </script>";
            exit(); // Ajoutez cette ligne pour terminer le script
        } else {
            // En cas d'échec, afficher un message d'erreur
            echo "Erreur lors de la suppression.";
            echo "<script>
                    alert('Impossible de supprimer la ligne.');
                    window.location.href = 'listenationalites.php';
                  </script>";
            exit(); // Ajoutez cette ligne pour terminer le script
        }
    } catch (PDOException $e) {
        // Intercepter l'exception PDO pour gérer la contrainte d'intégrité
        echo "Erreur : La suppression a échoué en raison d'une contrainte d'intégrité. Assurez-vous que cette nationalité n'est pas référencée ailleurs dans la base de données.";
        echo "<script>
                alert('Erreur : La suppression a échoué en raison d'une contrainte d'intégrité. Assurez-vous que cette nationalité n'est pas référencée ailleurs dans la base de données.');
                window.location.href = 'listenationalites.php';
              </script>";
        exit(); // Ajoutez cette ligne pour terminer le script
    }
}
?>
