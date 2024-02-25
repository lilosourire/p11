console.log("Chargement de plus d'images avec Ajax : son js est chargé");

(function ($) {
  $("#plusDImage").click(function () {
    var button = $(this),
      data = {
        action: "load_more",
        query: ajaxloadmore.query_vars,
        page: button.data("page"),
      };

    console.log("Données envoyées à la requête AJAX :", data);

    $.ajax({
      url: ajaxloadmore.ajaxurl,
      data: data,
      type: "POST",
      beforeSend: function (xhr) {
        button.text("Chargement...");
      },
      success: function (data) {
        console.log("Réponse AJAX réussie :", data);
        if (data === "no_posts") {
          console.log("Aucun article trouvé");
          button.remove();
        } else if (data) {
          console.log("Articles chargés avec succès");
          button.data("page", button.data("page") + 1);
          $("#blockPlusImage").before($(data));
          button.text("Charger plus");
          attachEventsToImages();
        } else {
          console.log("Aucune donnée renvoyée");
          button.text("Plus de photos à charger");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Erreur AJAX :", textStatus, errorThrown);
      },
    });
  });
})(jQuery);
