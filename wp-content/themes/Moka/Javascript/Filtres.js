/* les Filtres */
console.log("les Filtres : son js est chargé");

// Assurez-vous que jQuery est chargé avant ce code

jQuery(document).ready(function ($) {
  // Activer Select2 pour les éléments ayant la classe 'select2'
  $(".taxonomy-select").select2();
});

(function ($) {
  function fetchFilteredPhotos() {
    var filter = {
      categorie: $("#categorie").val(),
      format: $("#format").val(),
      annees: $("#annees").val(),
    };

    $.ajax({
      url: ajaxurl,
      data: {
        action: "filter_photos",
        filter: filter,
      },
      type: "POST",
      beforeSend: function () {
        $("#containerPhoto").html('<div class="loading">Chargement...</div>');
      },
      success: function (data) {
        $("#containerPhoto").html(data);
        attachEventsToImages();
        setTimeout(function () {
          document.getElementById("containerPhoto").scrollIntoView();
        }, 0);
      },
    });
  }

  $("#filtrePhoto select").on("change", function (event) {
    event.preventDefault();
    fetchFilteredPhotos();
  });
})(jQuery);
