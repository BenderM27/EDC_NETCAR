function recherche_client() {
    $.ajax({
        // chargement du fichier externe monfichier-ajax.php 
        url: "recherche_client.php",
        // Passage des données au fichier externe (ici le nom cliqué)  
        data: {
            id_client: document.getElementById('id_client')
        },
        cache: false,
        dataType: "json",
        error: function (request, error) { // Info Debuggage si erreur         
            alert("Erreur : responseText: " + request.responseText);
        },
        success: function (data) {
            // Informe l'utilisateur que l'opération est terminé et renvoie le résultat
            alert(data.PrenomEleve);
            // J'écris le résultat prénom de l'élève dans le h1
            $(#erreur).html(data.PrenomEleve);
        }
    });
});
