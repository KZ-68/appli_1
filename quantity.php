<?php

session_start();


            if (isset($_POST['removeOne'])){ // On vérifie l'existence de la clé de donnée $index envoyée
                
                $product = $_SESSION['products'][$_POST['productIndex']];

                if ($product["qtt"] != 1){ // Si le tableau products inscrit en session contenant la clé  
                    
                    $product["qtt"] -= 1; 
                    $product["total"]= ($product["qtt"]) * ($product["price"]); 
                    
                }        
                
                header("Location:recap.php");

            }
        

 
            if (isset($_POST['addOne'])){        

                $product = $_SESSION['products'][$_POST['productIndex']];

                $product["qtt"] += 1; 
                $product["total"]= ($product["qtt"]) * ($product["price"]);                                      
                                    
                header("Location:recap.php");   
  
            }
 