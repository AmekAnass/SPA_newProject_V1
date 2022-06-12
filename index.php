<?php
    require 'connection.php';
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $adress = $_POST["adress"];
        $availablity = $_POST["availablity"];
        $birthDate = $_POST["birthDate"];
        $desc = $_POST["desc"];
        if($_FILES["image"]["error"] === 4){
            echo
            "<script> alert('Image existe pas'); </script>"
            ;
        }
        else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));

            if(!in_array($imageExtension, $validImageExtension)){
                echo
                "<script> alert('Image est invalide'); </script>"
                ;
    
            }
            else if($fileSize > 1000000){
                echo
                "<script> alert('La taille de limage est tres grande'); </script>"
                ;
    
            }
            else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpName, 'img/'. $newImageName);
                $query = "INSERT INTO tb_upload VALUES('', '$name','$adress', '$availablity', '$birthDate', '$desc', '$newImageName')";
                mysqli_query($conn, $query);
                echo
                "<script> alert('Image ajoutée !'); </script>"
                ;
    
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


