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
    
    //quand le bouton submit est cliqué
    if(isset($_POST["submit"])){
        
        //vérification si un fichier a été téléchargé, si aucun lancer requete
        if($_FILES["image"]["error"] === 4){
            echo
            "<script> alert('Image existe pas'); </script>"
            ;
        }
        else{
            //initialisation de variable pour récupérer le nom, la taille, et le stockage temporaire du fichier
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            //spécifier les extensions acceptées 
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            //la fonction explde() scinde une chaîne de caractères en segments avec le séparateur "." ==> cela est pour pouvoir récupérer l'extension du fichier téléchargé
            $imageExtension = explode('.', $fileName);

            //transformer la chaine de caractére en miniscules du dernier élement du tableau grace à la fonction end() 
            
            $imageExtension = strtolower(end($imageExtension));

            //si l'extension du fichier n'existe pas dans le tableau "validImageExtension" contenant les extensions acceptées ==> lancer exception 
            if(!in_array($imageExtension, $validImageExtension)){
                echo
                "<script> alert('Image est invalide'); </script>"
                ;
    
            }
            //else si la taille du fichier dépasse 1mo ==> lancer exception
            else if($fileSize > 1000000){
                echo
                "<script> alert('La taille de limage est tres grande'); </script>"
                ;
    
            }
            
            else {

                //récupérer le nom, l'adresse, la disponibilité, la date de naissance, la description et l'image de l'animal 
                $name = $_POST["name"];
                $adress = $_POST["adress"];
                $availablity = $_POST["availablity"];
                $birthDate = $_POST["birthDate"];
                $desc = $_POST["desc"];
        
                //donner un nom unique à l'image
                $newImageName = uniqid();
                //ajouter l'extension au nom de l'image
                $newImageName .= '.' . $imageExtension;

                //télécharger l'image dans le dossier img
                move_uploaded_file($tmpName, 'img/'. $newImageName);

                //préparer la requete d'insertion des données récupérées dans la base de données 
                $query = "INSERT INTO tb_upload VALUES('', '$name','$adress', '$availablity', '$birthDate', '$desc', '$newImageName')";

                //exécution et vérification de l'exécution de la requete d'insertion, si erreur ==> lancer message d'erreur   
                if(!mysqli_query($conn, $query)){
                    echo
                    "<script> alert('Un problème est survenu veuillez réessayer ultérieurement...') </script>"
                    ;
                } 
                //si tout s'est bien passée, lancement du message de succès
                else {
                    echo
                    "<script> alert('Animal ajouté au catalogue'); </script>"
                    ;
    
                }
    
            }
        }
    } 

?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/formAjoutAnimal.css">
        <title>Ajout d'animal</title>
    </head>
    <body>
        <h2 style="text-align: center"> Formulaire d'ajout animal  </h2>
        <div class="container">
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                    <div class="col-25">

                        <label for="name">Nom : </label>
                    </div>
                    
                    <div class="col-75">
                            <input type="text" name="name" placeholder="Tapez le nom de l'animal" id = "name" required value=""> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">

                        <label for="adress">Adresse : </label>
                    </div>
                    
                    <div class="col-75">
                            <input type="text" name="adress" placeholder="Tapez l'adresse l'animal" id = "adress" required value=""> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="availablity">Disponible à l'adoption : </label>
                    </div>
                    
                    
                    <div class="col-75">
                        <select name="availablity" id="pet-select" required value="">
                        <option value="">--Disponible à l'adoption ?--</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                        </select>
                    </div>
                        
                </div>

                <div class="row">
                    <div class="col-25">

                        <label for="birthDate">Date de naissance : </label>
                    </div>
                    
                    <div class="col-75">
                        <input type="date" name="birthDate" id = "birthDate" required value=""> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="desc">Description : </label>
                    </div>
                        
                        <div class="col-75">
                            <textarea type="text" name="desc" placeholder="Tapez une description pour l'animal" id = "desc" required value="" style="height:200px"></textarea> <br>
                        </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-25">

                    <label for="image">Image : </label>
                    </div>

                    <div class="col-75">
                        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br>
                    </div>
                
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Valider"></input>
                </div>
            </form>
        </div>
            <br>

                <div class="row">
                <a href="data.php">Catalogue</a>
                </div>

    </body>
</html>


