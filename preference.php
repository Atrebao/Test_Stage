<?php 
session_start();
if (!isset($_SESSION['authenticated'])) {
    // Redirection vers la page d'authentification si l'utilisateur n'est pas authentifié
    header('Location: connection.php');
    exit;
}


    // Vérification de la requête asynchrone
if(isset($_POST['preferences'])) {
    $preferences = $_POST['preferences'];

    // Récupération de l'ID de l'utilisateur (à adapter selon ta structure)
    $userId = $_SESSION['id']; // Exemple : utilisateur avec ID 1

    // Mise à jour de la colonne "preference_sport" dans la table "user"
    //$sql = "UPDATE user SET Preference = '$preferences' WHERE id = '$userId'";
    $sql = "INSERT INTO `user` (Preference) VALUES (`$preferences`) WHERE id = `$userId` ";

    if ($conn->query($sql) === TRUE) {
        echo "Préférences enregistrées avec succès !";
    } else {
        echo "Erreur lors de l'enregistrement des préférences : " . $conn->error;
    }
}
else{
    echo "Hello";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preference</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
   
    <div class="container">
        <div class="row">
            <div class="col l3 m3 s12"></div>
            <div class="col l6 m6 s12">
                <div class="card-panel preference">
                    <h5 class="center title-pref">
                        Choisissez votre preference de sport
                    </h5>
                    <div class="check">
                        <p>
                            <label id="foot" onclick="savePreferences()" name="preferences[]">
                              <input type="checkbox" class="filled-in" value="FootBall" />
                              <span> FootBall</span>
                            </label>
                        </p>
    
                        <p >
                            <label id="footA">
                              <input type="checkbox" class="filled-in" value = "FootBall Americain"/>
                              <span>FootBall Americain</span>
                            </label>
                        </p>
    
                        <p>
                            <label id="bask">
                              <input type="checkbox" class="filled-in" value="BasketBall"/>
                              <span>BasketBall</span>
                            </label>
                        </p>
    
                        <p>
                            <label id="voll">
                              <input type="checkbox" class="filled-in" value="VolleyBall"/>
                              <span>VolleyBall</span>
                            </label>
                        </p>
    
                        <p>
                            <label id="rug">
                              <input type="checkbox" class="filled-in" value="Rugby"/>
                              <span>Rugby</span>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="preference.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
</body>
</html>