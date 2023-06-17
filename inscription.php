<?php


include "db_conn.php";

if (isset($_POST["submit"])) {
   $nom = $_POST['nom'];
   $nomEncryp = md5($nom);
   $prenom = $_POST['prenom'];
   $telephone = $_POST['telephone'];
   $photo = $_POST['photo'];

/*
   if($_FILES['photo']['error']>0){
    echo "Une erreur est survenue lors du transfert";
    die;
  }
  else{
    $validExt = array('.jpg', '.png', '.gif', '.jpeg');
    $filesSize = $_FILES['photo']['size'];
    $fileExt = ".". strtolower(substr(strrchr($_FILES['photo']['name'],'.'),1));
    if(!in_array($fileExt,$validExt)){
        echo "Ce fichier n'est pas une image";
        die;
    }
    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    //move_uploaded_file($tempname, $filename);

    $folder = "images/".$filename;
    move_uploaded_file($tempname, $folder);
  }
*/

  

   $sql = "INSERT INTO `user`(`id`, `Nom`, `Prenom`, `Telephone`, `Photo`) VALUES (NULL,'$nom','$prenom','$telephone','$photo')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col l3 m3 s12"></div>
            <div class="col l6 m6 s12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-panel z_depth-5">
                        <h5 class="center" >Inscription</h5>
                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" name="nom" id="nom">
                            <label >Entrer le nom</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" name="prenom" id="prenom">
                            <label >Entrer le prenom</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">local_phone</i>
                            <input type="tel" name="telephone" id="telephone">
                            <label >Entrer le numero de telephne</label>
                        </div>

                        <div class="file-field input-field">
                            <div class="btn">
                              <span>File</span>
                              <input type="file" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                
                             <input class="file-path validate" name="photo" type="text" placeholder="Upload la photo">
                            </div>
                          </div>

                          <div class="row"></div>
                          <button class="btn waves-effect waves-light " type="submit" name="submit">Envoyer
                            <i class="material-icons right">send</i>
                          </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>