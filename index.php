<?php
    
    session_start() // Il est important de démarrer une session si on veut récupérer les données actuelles et les stocker

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/main.css" />
        <title>Ajout Produit</title>
    </head>
    <body>
        <header>
            <h1>Formulaire d'ajout des produits</h1>
            <nav>
            <h2 id="menu">Menu</h2>        
            
            <form action ="recap.php" method="post">
                <ul>
                    <li><input class ="button_submit" type="submit" name="recap" value="Recapitulatif"></li>  
                </ul> 
            </form>          
            </nav>
        </header>
        
        <main>
            <form action="traitement.php" method="post"> 
            <?php 
                    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                        echo "<p> Nombre de produits : 0 </p>";
                    } else {
            
                    $productsCount = count($_SESSION['products']);
                        echo "<p> Nombre de produits : ".$productsCount."</p>";        
                    }
            ?>
            <!-- action (qui indique la cible du formulaire, le fichier à atteindre lorsque l'utilisateur soumettra le formulaire)
                method (qui précise par quelle méthode HTTP les données du formulaire seront transmises au serveur) -->
                <p>
                    <label>
                        Nom du produit :
                        <input type="text" name="name"></input>
                    </label>
                </p>
                <p>
                    <label>
                        Prix du produit :
                        <input type="number" step="any" name="price"></input>
                    </label>
                </p>
                <p>
                    <label>
                        Quantité désirée :
                        <input type="number" name="qtt" value="1"></input>
                    </label>
                </p>
                <p>
                    <input type="submit" name="submit" value="Ajouter le produit"> <!-- Le  champ  <input  type="submit">,  représente  le  bouton  de  soumission  du  formulaire-->
                </p>

                <?php
                if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {                

                } else {                    
                    $displayMessage = $_SESSION['checkProduct'];
                    echo "<p>".$displayMessage."</p>";        
                }
                ?>

            </form>
        </main>
    </body>    
</hmtl>