
        // Fonction pour envoyer les préférences au serveur de façon asynchrone
        function savePreferences() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var preferences = [];
            var check;

            // Parcours des cases cochées et ajout des préférences à un tableau
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    //console.log("Coché");
                    preferences.push(checkbox.value);
                    check = document.querySelector('input[type="checkbox"]').value;
                }
 
            });

            // Création de l'objet XMLHttpRequest
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'preference.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Envoi des préférences au fichier PHP
            xhr.send('preferences=' + JSON.stringify(preferences));

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        //console.log(xhr.responseText);
                        console.log(check);
                    } else {
                        console.log('Une erreur est survenue.');
                    }
                }
            };
        }

        //var btn1 = document.getElementById('btn1');
       // btn1.onclick = () =>document.body.style.backgroundColor = "blue";

        
        