<?php 
// Le démarrage de la session permet de stocker les données de navigations et de les réutiliser durant la session, un ID unique est stocké dans un cookie 
// et par défaut est supprimé à la fermeture du navigateur
session_start();

if(isset($_POST["submit"])) { // Vérifie l'existence de la clé "submit" dans le tableau $_POST
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS); // Ce filtre supprime une chaîne de caractères de toute présence de caractères spéciaux et de toute balise HTML potentielle ou les encode.
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // Valide le prix si il s'agit d'un nombre à virgule, on y ajoute les drapeaux FILTER_FLAG_ALLOW_THOUSAND, pour permettre l'utilisation du caractère "," ou "." pour la décimale
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // Valide la quantité si celle-ci est un nombre entier, au moins égal à 1
    
    // Donc à chaque donnée saisie dans le formulaire, les filtres vérifient si les données sont valides
    // Cela permet d'éviter les failles XSS et les injections SQL
    
    if ($name && $price && $qtt) {
        // Enregistrement du produit en session
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price*$qtt
        ];
        $_SESSION['products'][] = $product; // Sollicite le tableau de session $_SESSION et indique la clé "products" dans ce tableau
        $_SESSION['checkProduct'] = "Le produit à été bien ajouté !";

    } else {
        $_SESSION['checkProduct'] = "Echec de l'ajout du produit !";
    }

} 

if(isset($_POST['recap'])){

    header("Location:recap.php");

    exit; // Nécessaire pour empêcher que le script continue d'exécuter le header du dessous   
}

if(isset($_POST['return'])){

    header("Location:index.php");
    $_SESSION['checkProduct'] = "";

    exit; // Nécessaire pour empêcher que le script continue d'exécuter le header du dessous    
}

header("Location:index.php"); // La fonction header() effectue une redirection en servant du type d'appel "Location:"

exit;