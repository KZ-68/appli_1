<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/recap_style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Récupitulatif des produits</title>
</head>
<body>
    <header>
        <h1>Formulaire d'ajout des produits</h1>
        <nav>
            <h2 id="menu">Menu</h2>
            
            <form action ="traitement.php" method="post">
                <ul>
                    <li><input class ="button_submit" type="submit" name="return" value="Accueil"></li>  
                </ul> 
            </form>             
        </nav>
    </header>
    <?php 
        // Condition qui vérifie que si soit la clé "products" n'existe pas, soit que les données sont vides
        // isset détermine si une variable est considéré comme définie et renvoie true, et renvoi false si la variable est null
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo "<p>Aucun produit en session...</p>";
        } else { // Sinon, on crée un tableau en html
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                        "<th></th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0; // On initialise une variable $totalGeneral
        //  On crée une boucle qui exécute, produit par produit, les mêmes instructions qui vont permettre l'affichage uniforme de chacun d'entre eux. 
        // $index vaut pour l'index du tableau $_SESSION['products'], numéroté par produit
        // $product vaut pour les produits
        foreach($_SESSION['products'] as $index => $product) {
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>".$product['qtt']."<form action ='quantite.php' method='post'><input type='submit' name='removeItem' value='-'></form></td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td><form action ='delete.php' method='post'><input class ='btn btn-danger' type='submit' name='clearOne' value='Supprimer'></form></td>",
                    // number_format(variable à modifier, nombre de décimales souhaité, caractère séparateur décimal, caractère séparateur de milliers)
                "</tr>";
            $totalGeneral += $product['total']; // Ajoute le total du produit parcouru à la valeur de $totalGeneral
        }
        echo "<tr>",
            "<td colspan=4>Total général :</td>",
            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
            "</tr>",
        "</tbody>",
         "</table>";
        }
        
        if(!isset($_SESSION['nbProducts']) || empty($_SESSION['nbProducts'])) {
            echo "<p> Nombre de produits : 0 </p>";
        } else {

        $nbProducts = $_SESSION['nbProducts'];
            echo "Nombre de produits : ".$nbProducts.
            "<form action ='delete.php' method='post'><input class ='btn btn-danger' type='submit' name='clearAll' value='Tout supprimer'></form>" ;        
        }
    ?>
</body>
</html>
