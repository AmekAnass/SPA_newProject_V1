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
  
    <a href="index.php">Formulaire d'ajout animal</a>

    <?php

    //préparation de la requete de récupération des données des animaux dans la base de données
    $requete = "SELECT * FROM tb_upload ORDER BY id DESC";

    //lancement de la requete, si erreur lancer exception
    if(!mysqli_query($conn, $requete)){
      echo
      "<script> alert('Un problème est survenu veuillez réessayer ultérieurement...') </script>";
    }  

    //quand requete réussite, récupérer l'objet dans rows
    $rows = mysqli_query($conn, $requete);
    //vérificatin si aprés transformation de rows en tableau, la variable contient des données, si aucune donnée lancer exception
    if(mysqli_num_rows($rows) == 0) : ?>
      <p>Un probléme est survenu, veuillez réessayer plus tard </p>
  
    <?php 
      //si il existe des données, les afficher
      else : 
    ?>



    <table border = 1 cellspacing = 0 cellpadding = 10 align="center">
      <tr>
        <td>Nom</td>
        <td>Adresse</td>
        <td>Disponible à l'adoption</td>
        <td></td>
        <td>Image</td>
      </tr>
      
      <?php 
        //boucle pour afficher les données du tableau
        foreach ($rows as $row) : 
      ?>
      
      <tr>
        <!-- affichage des attributs -->

        <?php $id = $row["id"]; ?>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["adress"]; ?></td>
        <td><?php echo $row["availablity"]; ?></td>
        <!-- envoi de l'id dans l'url pour pouvoir récupérer par la suite les données supplémentaires de l'animal en question -->
        <td><?php echo "<a href='details.php?id=$id'>Voir plus</a>" ; ?></td>
        <td> <img src="img/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image']; ?>"> </td>
      </tr>

      <?php 
        endforeach; 
        endif; 
      ?>

    </table>
    <br>
  </body>
</html>