<?php
  
  //récupération de la connexion au serveur à travers le fichier connection
  if (file_exists("connexion.php")) {
    //inclure le fichier connexion et l'exécuter
    require "connexion.php";
  }
  //si fichier n'existe pas lancer un message
  else {
    echo "Un problème est survenu veuillez réessayer ultérieurement...";
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Data</title>
    </head>
    <body>
  
    <li><a href="index.php">Formulaire d'ajout animal</a></li>
    <li><a href="data.php">Retour</a></li>


    <?php

      //récupération de l'id de l'url
      $id = $_GET['id'];
      //préparation de la requete pour récupérer les données supplémentaires sur l'animal en question
      $sql =  "SELECT * FROM tb_upload WHERE id = $id";
      //lancer la requete et vérifier si bien executé
      if(!mysqli_query($conn, $sql)){
        echo
        "<script> alert('Un problème est survenu veuillez réessayer ultérieurement...') </script>";
      }  

      //transformer l'objet que mysqli_query retourne en tableau
      $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
      ?>
      
      <?php
        //si le tableau ne contient pas de données ==> lancer exception
        if(sizeof($row) == 0) : 
      ?>
        <td>Un probléme est survenu, veuillez réessayer plus tard </td>
      <?php
        //si le tableau est rempli 
        else : 
      ?>



    <table border = 1 cellspacing = 0 cellpadding = 10 align="center">
      <tr>
        <td>Nom</td>
        <td>Adresse</td>
        <td>Disponibilité</td>
        <td>Date de naissance</td>
        <td>Description</td>
        <td>Image</td>
      </tr>

      <!-- affichage des attributs  -->
      <tr>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["adress"]; ?></td>
        <td><?php echo $row["availablity"]; ?></td>
        <td><?php echo $row["birthDate"]; ?></td>
        <td><?php echo $row["description"]; ?></td>
        <td> <img src="img/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image'];?>"> </td>
      </tr>
    </table>
    <?php endif; ?>
    <br>
  </body>
</html>