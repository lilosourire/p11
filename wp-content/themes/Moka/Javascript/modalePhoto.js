console.log("fullscreen-modal.js chargé");

jQuery(document).ready(function ($) {
  const fullscreenIcon = $(".fullscreen-icon");

  fullscreenIcon.on("click", function (event) {
    event.preventDefault();

    const photoUrl = $(this).data("full") || "";

    console.log("Ouverture de la modale en plein écran");

    // Ajoutez ici le code pour afficher votre modale en plein écran
    // Vous pouvez utiliser une classe, une animation ou une autre méthode selon vos besoins

    $("body").addClass("modal-open"); // Ajoute une classe pour empêcher le défilement du fond
    $(".fullscreen-modal img").attr("src", photoUrl);
    $(".fullscreen-modal").addClass("open");
  });

  $(".fullscreen-modal").on("click", function (event) {
    if (event.target === this) {
      // Fermez la modale en plein écran lorsque vous cliquez en dehors de l'image
      $("body").removeClass("modal-open"); // Supprime la classe pour rétablir le défilement du fond
      $(".fullscreen-modal").removeClass("open");
    }
  });
});
