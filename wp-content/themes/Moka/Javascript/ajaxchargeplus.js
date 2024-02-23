jQuery(document).ready(function ($) {
  var button = $("#plusDImage");
  var imagesContainer = $("#imagesContainer");
  var page = 1;

  button.on("click", function () {
    console.log("Bouton 'Charger plus' cliqué");

    var data = {
      action: "load_more_photos", // Utilisez le nom correct de l'action défini dans le fichier PHP
      page: page,
      query: JSON.stringify(ajax_params.query_vars),
    };

    $.ajax({
      url: ajax_params.ajax_url,
      type: "POST",
      data: data,
      success: function (response) {
        console.log("Réponse du serveur :", response);

        if (response !== "no_posts") {
          page++;
          imagesContainer.append(response);
        } else {
          button.remove();
        }
      },
      error: function () {
        console.error("Erreur lors de la requête AJAX");
        button.text("Erreur");
      },
      complete: function () {
        button.text("Charger plus");
      },
    });

    button.text("Chargement...");
  });
});
