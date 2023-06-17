<?php 
session_start();
include "db_conn.php";

if (!isset($_SESSION['authenticated'])) {
  // Redirection vers la page d'authentification si l'utilisateur n'est pas authentifié
  header('Location: connection.php');
  exit;
}

$id = $_SESSION["id"];

if (isset($_POST["submit"])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $telephone = $_POST['telephone'];
  $photo = $_POST['photo'];
  $preference = $_POST['preference'];

  $sql = "UPDATE `user` SET `Nom`='$nom',`Prenom`='$prenom',`Telephone`='$telephone',`Preference`='$prefernce',`Photo`='$photo' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: profile.php?msg=Data updated successfully");
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
    <title>Espace</title>
                <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Bienvenue <?php echo $_SESSION["nom"] ?></a>
    </div>
    

<ul id="slide-out" class="sidenav">
  <li><div class="user-view">
    <div class="background">
      <img src="images/office.jpg">
    </div>
    <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
    <a href="#name"><span class="white-text name">John Doe</span></a>
    <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
  </div></li>
  <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
  <li><a href="#!">Second Link</a></li>
  <li><div class="divider"></div></li>
  <li><a class="subheader">Subheader</a></li>
  <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>

  <!--  -->
    <div class="row"></div>
    <div class="container">
        <div class="row">
            <div class="col l2 m2"></div>
            <div class="col l8 m6">
                <div class="card horizontal profile">
                    <div class="card-image">
                        <a  href="#login" class="modal-trigger"><img class="pp" style="width: 100px ; height: 100px;" src="C:\Users\HP\Pictures\Saved Pictures\R (1).jfif" alt=""></a>

                    </div>
                    <div class="card-stacked ">
                        <div class="card-content">
                          <div class="infos">
                            <div class="info">
                              <h5>Nom :</h5>
                              <p><?php echo $_SESSION["nom"]; ?></p>
                            </div>
                            <br>

                            <div class="info">
                              <h5>Prenoms :</h5>
                              <p> <?php echo " ". $_SESSION["prenom"]; ?></p>
                            </div>
                            <br>

                            <div class="info">
                              <h5>Telephone : </h5>
                              <p> <?php echo $_SESSION["telephone"]; ?></p>
                            </div>
                            <br>

                            <div class="info">
                              <h5>Preference :</h5>
                              <p><?php echo $_SESSION["preference"]; ?></p>
                            </div>
                            <br>

                            


                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->

    <div class="" >
        <div class="container s12 modal modal-fixed-footer" id="login">
            <div class="row">
                <div class="col l3 m2 s12"></div>
                <div class="col l6 m8 " >
                    <form action="" method="post">
                        <div class="card-panel z_depth-5">
                            <h5 class="center" >Modifier</h5>
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="nom" id="nom" value = "<?php echo $_SESSION["nom"]; ?>">
                                <label >Entrer le nom</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" name="prenom" id="prenom" value = "<?php echo $_SESSION["prenom"]; ?>">
                                <label >Entrer le prenom</label>
                            </div>

                            <div class="input-field">
                                <i class="material-icons prefix">local_phone</i>
                                <input type="tel" name="telephone" id="telephone" value = "<?php echo $_SESSION["telephone"]; ?>">
                                <label >Entrer le numero de telephne</label>
                            </div>

                            <div class="file-field input-field">
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" name="photo" type="text" placeholder="Upload la photo" value = "<?php echo $_SESSION["photo"]; ?>">
                                </div>
                              </div>
                              <!--
                                                              <div class="row"></div>
                              <button class="btn waves-effect waves-light " type="submit" name="submit">Envoyer
                                <i class="material-icons right">send</i>
                              </button>

                                -->
                                    <div class="container footer">
                                
                                        <input type="submit" name="submit" value="login" class="btn pulse">
                                          <input type="button"  value="close" class="btn modal-close red">
                                      </div>
                                
                                 

                        </div>
                    </form>
                </div>
          </div>

            </div>
        </div>


    </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
<script>
      const login = document.querySelectorAll(".modal");
      M.Modal.init(login,{
        opacity:0.7,
        dismissible:false
      });
</script>   
</body>
</html>