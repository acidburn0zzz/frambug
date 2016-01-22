
// Forulaire openbug

$(document).ready(function() {
    // Lorsque je soumets le formulaire
    $('#formopenbug').on('submit', function(e) {
        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
 
        var $this = $(this); // L'objet jQuery du formulaire
 
        // Je récupère les valeurs
        var bug_name = $('#bug_name').val();
        var bug_text = $('#bug_text').val();
 
        // Je vérifie une première fois pour ne pas lancer la requête HTTP
        // si je sais que mon PHP renverra une erreur
        if(bug_name == '' || bug_name == '' ) {
            alert('Les champs doivent êtres remplis');
        } else {
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                dataType: 'json', // JSON
                success: function(json) {
			if(json.reponse === 'ok') {
                       		//alert('Tout est bon');
				window.location.href = 'list.php';
	                } else {
                        	alert('Erreur : '+ json.reponse);
                    	}
		}
            });
        }
    });
});


// Lien a asupprimerxxxx
$(document).ready(function() {
    // Lorsque je soumets le formulaire
    $('.asupprimerxxxx').on('click', function(e) {
        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire

        var $this = $(this); // L'objet jQuery du formulaire

        // Je récupère les valeurs
        var id = $('#id').val();

        // Je vérifie une première fois pour ne pas lancer la requête HTTP
        // si je sais que mon PHP renverra une erreur
        if(id == '') {
            alert('Les champs doivent être remplis');
        } else {
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                dataType: 'json', // JSON
                success: function(json) {
                        if(json.reponse === 'ok') {
                                //alert('Tout est bon');
                                window.location.href = 'admin.php';
                        } else {
                                alert('Erreur : '+ json.reponse);
                        }
                }
            });
        }
    });
});

