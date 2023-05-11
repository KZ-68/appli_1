<?php

session_start();

foreach ($_POST as $value) // Pour chaque envoi de donnée considérée comme une valeur (value=)
{
    if ($value == "-" ) {  

        foreach ($_SESSION['products'] as $index => $product) // On parcours le tableau associatif products avec les index 
        {
            if (isset($_POST[$index])){ // On vérifie l'existence de la clé de donnée $index envoyée
                
                if ($_SESSION['products'][$index]["qtt"] != 1){ // Si le tableau products inscrit en session contenant la clé  
                
                    $_SESSION['products'][$index]["qtt"] -= 1; 
                    $_SESSION['products'][$index]["total"]= ($_SESSION['products'][$index]["qtt"]) * ($_SESSION['products'][$index]["price"]); 
                }        
                
                header("Location:recap.php");
                exit;
            }
        }

    } else if($value == "+"){ // Condition si le symbole '+' existe

        foreach ($_SESSION['products'] as $index => $product) 
        {
            if (isset($_POST[$index])){        

                $_SESSION['products'][$index]["qtt"] += 1; 
                $_SESSION['products'][$index]["total"]= ($_SESSION['products'][$index]["qtt"]) * ($_SESSION['products'][$index]["price"]);                                      
                                    
                header("Location:recap.php");   
                exit;    
            }
        }
    }
}