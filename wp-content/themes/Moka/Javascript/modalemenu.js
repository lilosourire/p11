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
