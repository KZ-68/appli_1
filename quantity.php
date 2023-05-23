<?php

session_start();


            if (isset($_POST['removeOne'])){ // On vérifie l'existence de la clé avec le nom "removeOne" envoyée
                
                if ($_SESSION['products'][$_POST['productIndex']]['qtt'] != 1){  
                    
                    $_SESSION['products'][$_POST['productIndex']]['qtt'] -= 1; 
                    $_SESSION['products'][$_POST['productIndex']]['total']= ($_SESSION['products'][$_POST['productIndex']]['qtt']) * ($_SESSION['products'][$_POST['productIndex']]['price']); 
                    
                }
                
                header('Location:recap.php');

            } else if (isset($_POST['addOne'])){ // Sinon si l'existence de la clé avec le nom "addOne" envoyée existe      

                $_SESSION['products'][$_POST['productIndex']]['qtt'] += 1; 
                $_SESSION['products'][$_POST['productIndex']]['total']= ($_SESSION['products'][$_POST['productIndex']]['qtt']) * ($_SESSION['products'][$_POST['productIndex']]['price']);                                      
                                    
                header('Location:recap.php');
  
            }
 