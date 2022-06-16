<?php 
    
    //requete de connexion au serveur, si erreur affichage de message : erreur serveur
    $conn = mysqli_connect("localhost", "root", "", "upload") or die("Erreur serveur");
?>