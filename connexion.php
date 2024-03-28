<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=biblio', "root", "");    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // tenter de réessayer la connexion après un certain délai, par exemple
    print "erreur !" . $e->getMessage() . "<br>";
    die();
}

