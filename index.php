<?php 
session_start();
include "db_conn.php";

if (!isset($_SESSION['authenticated'])) {
  // Redirection vers la page d'authentification si l'utilisateur n'est pas authentifié
  header('Location: connection.php');
  exit;
}
else{
  echo $_SESSION['authenticated'];
  echo $_SESSION['nom'];
}

if (!isset($_SESSION['authenticated'])) {
  // Redirection vers la page d'authentification si l'utilisateur n'est pas authentifié
  header('Location: authentification.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations</title>
            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
</head>
<body>

    <div class="row"></div>
    
    <div class="container">
        <table class="striped centered">
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Telephone</th>
                  <th>Preference</th>
                  <th>Photos</th>
              </tr>
            </thead>
    
            <tbody>
            <?php
        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
              <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["Nom"] ?></td>
                <td><?php echo $row["Prenom"] ?></td>
                <td><?php echo $row["Telephone"] ?></td>
                <td><?php echo $row["Preference"] ?></td>
                <td><?php echo $row["Photo"] ?></td>
              </tr>
        <?php
        }
        ?>
            </tbody>
          </table>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>