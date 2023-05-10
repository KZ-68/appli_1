<?php
    session_start();

if(isset($_POST['clearAll'])) {
    unset($_SESSION['products']); // Supprime les éléments du tableau products de la session
    $_SESSION['nbProducts'] = 0; // Remet le compteur de produits à 0
    
    header("Location:recap.php"); // Redirige vers la page recap

    exit;
}

foreach($_SESSION['products'] as $index => $product) {
    if(isset($_POST['clearOne'])) {
        unset($_SESSION['products'][$index]);
        $_SESSION['nbProducts'] -= 1;

        header("Location:recap.php"); // Redirige vers la page recap

        exit;
    }

}