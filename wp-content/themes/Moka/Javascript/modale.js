// création du js pour la modale
console.log("modale-contact.js chargé");

jQuery(document).ready(function ($) {
  const overlay = $(".popup-overlay");

  $("#contact-modale").on("click", function (event) {
    event.preventDefault();
    const reference = $(this).data("reference") || "";

    console.log("Référence récupérée :", reference);

    overlay.addClass("open");
    $("#referencePhoto").val(reference);

    console.log("Champ pré-rempli :", $("#referencePhoto").val());
  });

  overlay.on("click", function (event) {
    if (event.target === this) {
      overlay.removeClass("open");
    }
  });
});

// #menu-item-27
// #menu-item-27 > a

jQuery(document).ready(function ($) {
  const overlay = $(".popup-overlay");
  const menu27 = $("#menu-item-27"); // Nouvelle variable pour stocker l'élément

  menu27.on("click", function (event) {
    event.preventDefault();

    overlay.addClass("open");
  });

  overlay.on("click", function (event) {
    if (event.target === this) {
      overlay.removeClass("open");
    }
  });
});
