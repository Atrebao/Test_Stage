<?php 
session_start();
include "db_conn.php";



    if(isset($_POST['submit'])){
        $_SESSION['authenticated'] ;
        echo "ok";
        $telephone = $_POST['telephone'];
        
        $sql= "SELECT * FROM user WHERE  Telephone = '$telephone'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) ==1){
            
            while ($row = mysqli_fetch_assoc($result)){
                $_SESSION['id'] = $row['id'];
                $_SESSION['nom'] = $row['Nom'];
                $_SESSION['prenom'] = $row['Prenom'];
                $_SESSION['telephone'] = $row['Telephone'];
                $_SESSION['preference'] = $row['Preference'];
                $_SESSION['photo'] = $row['Photo'];

                header("Location:profile.php");

            }
        }
        else{
            echo "erreur";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
                <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col m4"></div>
            <div class="col  m4 s12">
                <form action="" method="post">
                    <div class="card-panel z_depth-5">
                        <div class="container">
                            <h3 class="center">Connexion</h3>
                            <div class="input-field">
                                <input type="text" name="telephone" id="telephone" require>
                                <label >Telephone</label>
                            </div>
                            <button type="submit" class="btn" name="submit">Envoyer</button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>   
</body>
</html>