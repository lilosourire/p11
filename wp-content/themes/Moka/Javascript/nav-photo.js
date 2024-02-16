// console.log("le js de la nav est appellé correctement");

// jQuery(document).ready(function ($) {
//   // Cachez la miniature de la première photo au début
//   $(".thumbnail:first-child img").hide();

//   // Affiche la miniature de la photo actuelle au début
//   $(".thumbnail.active img").show();

//   // Effet de survol sur la flèche gauche
//   $(".arrow-left").hover(
//     function () {
//       var prevThumbnail = $(".thumbnail.active").prev();
//       if (prevThumbnail.length > 0) {
//         // Cache la miniature de la photo actuelle
//         $(".thumbnail.active img").hide();

//         // Affiche la miniature de la photo précédente
//         prevThumbnail.find("img").show();
//       }
//     },
//     function () {
//       // Cache la miniature au survol
//       $(".thumbnail img").hide();
//     }
//   );

//   // Effet de survol sur la flèche droite
//   $(".arrow-right").hover(
//     function () {
//       var nextThumbnail = $(".thumbnail.active").next();
//       if (nextThumbnail.length > 0) {
//         // Cache la miniature de la photo actuelle
//         $(".thumbnail.active img").hide();

//         // Affiche la miniature de la photo suivante
//         nextThumbnail.find("img").show();
//       }
//     },
//     function () {
//       // Cache la miniature au survol
//       $(".thumbnail img").hide();
//     }
//   );
// });
console.log("le js de la nav est appelé correctement");

// jQuery(document).ready(function ($) {
//   // Affiche la miniature de la photo actuelle au début
//   $(".thumbnail.active img").show();

//   // Effet de survol sur la flèche gauche
//   $(".arrow-left").hover(
//     function () {
//       var prevThumbnail = $(".thumbnail.active").prev();
//       if (prevThumbnail.length > 0) {
//         // Cache la miniature de la photo actuelle
//         $(".thumbnail.active img").hide();

//         // Affiche la miniature de la photo précédente
//         prevThumbnail.find("img").show();
//       }
//     },
//     function () {
//       // Cache la miniature au survol
//       $(".thumbnail img").hide();
//     }
//   );

//   // Effet de survol sur la flèche droite
//   $(".arrow-right").hover(
//     function () {
//       var nextThumbnail = $(".thumbnail.active").next();
//       if (nextThumbnail.length > 0) {
//         // Cache la miniature de la photo actuelle
//         $(".thumbnail.active img").hide();

//         // Affiche la miniature de la photo suivante
//         nextThumbnail.find("img").show();
//       }
//     },
//     function () {
//       // Cache la miniature au survol
//       $(".thumbnail img").hide();
//     }
//   );
// });
// Fonction pour charger et afficher la miniature en fonction de l'ID de la page
// document.addEventListener("DOMContentLoaded", function () {
//   // Récupérer les éléments HTML
//   const previewContainer = document.getElementById(
//     "miniature-preview-container"
//   );
//   const previewImage = document.getElementById("miniature-preview");

//   // Gestionnaire d'événements pour le survol de la flèche gauche
//   document
//     .querySelector(".arrow-left")
//     .addEventListener("mouseover", function () {
//       previewImage.src = this.dataset.thumbnailUrl;
//       previewImage.alt = "Miniature précédente";
//     });

//   // Gestionnaire d'événements pour le survol de la flèche droite
//   document
//     .querySelector(".arrow-right")
//     .addEventListener("mouseover", function () {
//       previewImage.src = this.dataset.thumbnailUrl;
//       previewImage.alt = "Miniature suivante";
//     });

//   // Gestionnaire d'événements pour le survol du conteneur (réinitialiser l'image)
//   previewContainer.addEventListener("mouseout", function () {
//     previewImage.src = "";
//     previewImage.alt = "Miniature prévisualisée";
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  // Récupérer les éléments HTML
  const previewContainer = document.getElementById(
    "miniature-preview-container"
  );
  const previewImage = document.getElementById("miniature-preview");

  // Gestionnaire d'événements pour le survol de la flèche gauche
  document
    .querySelector(".arrow-left")
    .addEventListener("mouseover", function () {
      console.log(
        "URL de la miniature précédente :",
        this.dataset.thumbnailUrl
      );
      previewImage.src = this.dataset.thumbnailUrl;
      previewImage.alt = "Miniature précédente";
    });

  // Gestionnaire d'événements pour le survol de la flèche droite
  document
    .querySelector(".arrow-right")
    .addEventListener("mouseover", function () {
      console.log("URL de la miniature suivante :", this.dataset.thumbnailUrl);
      previewImage.src = this.dataset.thumbnailUrl;
      previewImage.alt = "Miniature suivante";
    });

  // Gestionnaire d'événements pour le survol du conteneur (réinitialiser l'image)
  previewContainer.addEventListener("mouseout", function () {
    previewImage.src = "";
    previewImage.alt = "Miniature prévisualisée";
  });
});
