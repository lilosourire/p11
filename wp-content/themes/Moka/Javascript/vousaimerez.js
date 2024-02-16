console.log("vous aimerez js est chargé");

// document.addEventListener("DOMContentLoaded", function () {
//   var relatedPhotoContainers = document.querySelectorAll(".related-photo");

//   relatedPhotoContainers.forEach(function (container) {
//     var overlay = document.createElement("div");
//     overlay.className = "singlePhotoOverlay";
//     container.appendChild(overlay);

//     container.addEventListener("mouseenter", function () {
//       // Afficher l'overlay
//       overlay.style.opacity = "0.8";
//       overlay.style.backgroundColor = "rgba(0, 0, 0, 0.8)";

//       // Afficher le bouton plein écran
//       var fullscreenIcon = document.createElement("div");
//       fullscreenIcon.className = "fullscreen-icon";
//       fullscreenIcon.innerHTML =
//         '<img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/imagewebp/fullscreen.png" alt="Icone fullscreen">';
//       container.appendChild(fullscreenIcon);
//     });

//     container.addEventListener("mouseleave", function () {
//       // Masquer l'overlay
//       overlay.style.opacity = "0";
//       overlay.style.backgroundColor = "rgba(0, 0, 0, 0)";

//       // Masquer le bouton plein écran
//       var fullscreenIcon = container.querySelector(".fullscreen-icon");
//       if (fullscreenIcon) {
//         container.removeChild(fullscreenIcon);
//       }
//     });
//   });
// });
console.log("vous aimerez js est chargé");

document.addEventListener("DOMContentLoaded", function () {
  var relatedPhotoContainers = document.querySelectorAll(".related-photo");

  relatedPhotoContainers.forEach(function (container) {
    var overlay = document.createElement("div");
    overlay.className = "singlePhotoOverlay";

    var eyeIcon = document.createElement("div");
    eyeIcon.className = "center-icon";

    var eyeImage = document.createElement("img");
    eyeImage.src = "../image/imagewebp/icon_eye.png"; // Modifier le chemin ici
    eyeImage.alt = "Icone oeil";

    eyeIcon.appendChild(eyeImage);
    overlay.appendChild(eyeIcon);

    container.appendChild(overlay);

    container.addEventListener("mouseenter", function () {
      // Afficher l'overlay
      overlay.style.opacity = "0.8";
      overlay.style.backgroundColor = "rgba(0, 0, 0, 0.8)";

      // Afficher le bouton plein écran
      var fullscreenIcon = document.createElement("div");
      fullscreenIcon.className = "fullscreen-icon";

      var fullscreenImage = document.createElement("img");
      fullscreenImage.src = "../image/imagewebp/fullscreen.png"; // Modifier le chemin ici
      fullscreenImage.alt = "Icone fullscreen";

      fullscreenIcon.appendChild(fullscreenImage);
      container.appendChild(fullscreenIcon);
    });

    container.addEventListener("mouseleave", function () {
      // Masquer l'overlay
      overlay.style.opacity = "0";
      overlay.style.backgroundColor = "rgba(0, 0, 0, 0)";

      // Masquer le bouton plein écran
      var fullscreenIcon = container.querySelector(".fullscreen-icon");
      if (fullscreenIcon) {
        container.removeChild(fullscreenIcon);
      }
    });
  });
});
