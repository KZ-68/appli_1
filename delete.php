<?php
    session_start();

if(isset($_POST['clearAll'])) { // Vérifie que la clé 
    unset($_SESSION['products']); // Supprime les éléments du tableau products de la session
    
    header("Location:recap.php"); // Redirige vers la page recap

    exit;
}

// 1. adapter le if - Good!
// 2. checker si le exit est exécuté ou si le header redirige immédiatement - Good !
// 3. supprimer la notion $_SESSION['nbProducts'] et la remplacer par la donnée déjà existante (afin de ne pas avoir de duplication de données, ou d'info "inutile") - Good ! 
// 4. après avoir tout compris, réfléchir à comment supprimer le produit à supprimer, sans foreach

// info supplémentaire : $_POST['productIndex'] => sa valeur est l'index du produit à supprimer
// foreach($_SESSION['products'] as $index => $product) {
//     // 0=>"pomme" // 1=>"poire"
//     if(isset($_POST['clearOne']) && $index == $_POST['productIndex']) {
//         // true // true <-- devrait être false dans le cas où ce n'est pas le produit à supprimer// devrait être true seulement dans le cas où c'est le produit à supprimer
//         unset($_SESSION['products'][$index]);
    
//         header("Location:recap.php"); // Redirige vers la page recap
    
//         var_dump($_SESSION);
//         die();
//         exit;
//     }
    
// }

if(isset($_POST['clearOne']) && isset($_POST['productIndex'])) {
    // true // true <-- devrait être false dans le cas où ce n'est pas le produit à supprimer// devrait être true seulement dans le cas où c'est le produit à supprimer
    unset($_SESSION['products'][$_POST['productIndex']]); // On peut accéder à l'index de product simplement en ajoutant directement le nom de la clé de l'index présent l'input

    header("Location:recap.php");
    exit; // Redirige vers la page recap
}

