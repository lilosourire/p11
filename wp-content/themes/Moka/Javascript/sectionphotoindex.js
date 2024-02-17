console.log("vous aimerez js est chargé");

// document.addEventListener("DOMContentLoaded", function () {
//   var relatedPhotoContainers = document.querySelectorAll(".related-photo");
//   var loadMoreButton = document.querySelector(".load-more-button"); // Ajout du bouton "Charger plus"

//   relatedPhotoContainers.forEach(function (container) {
//     var overlay = document.createElement("div");
//     overlay.className = "singlePhotoOverlay";

//     var eyeIcon = document.createElement("div");
//     eyeIcon.className = "center-icon";
//     eyeIcon.innerHTML =
//       '<img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/imagewebp/icon_eye.png" alt="Icone oeil">';
//     overlay.appendChild(eyeIcon);

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

//   // Ajouter l'événement "click" pour le bouton "Charger plus"
//   loadMoreButton.addEventListener("click", loadMorePhotos);

//   // Fonction pour charger plus de photos
//   function loadMorePhotos() {
//     // Appel à l'API WordPress pour charger 8 photos supplémentaires
//     // Mettez à jour le code en fonction de votre structure API WordPress
//     // Assurez-vous d'ajuster le nombre de photos à charger selon vos besoins
//     // Exemple de code fictif pour illustrer le concept
//     fetch("URL_DE_VOTRE_API_WORDPRESS?offset=8&limit=8")
//       .then((response) => response.json())
//       .then((data) => {
//         // Ajouter les nouvelles photos dans relatedPhotoContainers
//         data.forEach((photo) => {
//           var container = document.createElement("div");
//           container.className = "related-photo";

//           // Construire la structure HTML pour chaque nouvelle photo
//           // Assurez-vous d'ajuster le code en fonction de votre structure de données
//           container.innerHTML = `
//                         <img src="${photo.url}" alt="${photo.title}">
//                         <p>RÉF. PHOTO: ${photo.reference}</p>
//                     `;

//           // Ajouter la nouvelle photo au conteneur existant
//           relatedPhotoContainers[0].appendChild(container); // Choisissez le conteneur approprié
//         });
//       })
//       .catch((error) => console.error(error));
//   }
// });
document.addEventListener("DOMContentLoaded", function () {
  var relatedPhotoContainers = document.querySelectorAll(".square-photo");

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
