<?php

session_start();


            if (isset($_POST['removeOne'])){ // On vérifie l'existence de la clé de donnée $index envoyée
                
                if ($_SESSION['products'][$_POST['productIndex']]['qtt'] != 1){ // Si le tableau products inscrit en session contenant la clé  
                    
                    $_SESSION['products'][$_POST['productIndex']]['qtt'] -= 1; 
                    $_SESSION['products'][$_POST['productIndex']]['total']= ($_SESSION['products'][$_POST['productIndex']]['qtt']) * ($_SESSION['products'][$_POST['productIndex']]['price']); 
                    
                }
                
                header('Location:recap.php');

            } else if (isset($_POST['addOne'])){        

                $_SESSION['products'][$_POST['productIndex']]['qtt'] += 1; 
                $_SESSION['products'][$_POST['productIndex']]['total']= ($_SESSION['products'][$_POST['productIndex']]['qtt']) * ($_SESSION['products'][$_POST['productIndex']]['price']);                                      
                                    
                header('Location:recap.php');
  
            }
 