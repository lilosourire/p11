console.log("Chargement de plus de photos : JS est chargé");

jQuery(document).ready(function ($) {
  // Lorsque le bouton "Charger plus" est cliqué
  $("#plusDImage").on("click", function () {
    console.log("Bouton 'Charger plus' cliqué!");

    let page = $(this).data("page");
    let newPage = page + 1;
    const ajaxurl = ajax_params.ajax_url;

    $.ajax({
      type: "POST",
      url: ajax_params.ajax_url,
      data: {
        page: page,
        action: "load_more_photos",
      },
      success: function (response) {
        console.log("Données de la requête AJAX :", {
          page: page,
          action: "load_more_photos",
        });
        console.log("Réponse de la requête AJAX :", response);

        if (response !== "no_posts") {
          // Ajoutez les photos à votre conteneur
          $("#votre-conteneur-de-photos").append(response);
          page++; // Incrémente le numéro de page pour la prochaine requête
        } else {
          // S'il n'y a plus de photos, masquez le bouton "Charger plus"
          $("#load-more-button").hide();
        }
      },
    });
  });
});
