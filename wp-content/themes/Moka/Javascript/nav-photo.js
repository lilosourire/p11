console.log("le js de la nav est appellé correctement");
// function changePhoto(direction) {
//   // Obtenez l'élément nécessaire
//   var currentPhotoContainer = document.querySelector(".current-photo");

//   // Changez le contenu de l'élément en fonction de la direction
//   if (direction === "prev") {
//     // Obtenez l'URL de la photo précédente dynamiquement
//     currentPhotoContainer.innerHTML =
//       '<img src="' + previousPhotoUrl + '" alt="Current Photo">';
//   } else if (direction === "next") {
//     // Obtenez l'URL de la photo suivante dynamiquement
//     currentPhotoContainer.innerHTML =
//       '<img src="' + nextPhotoUrl + '" alt="Current Photo">';
//   }
// }

// console.log("Affichage Miniature : son js est chargé");

// $(document).ready(function () {
//   const miniPicture = $("#miniPicture");

//   $(".arrow-left, .arrow-right").hover(
//     function () {
//       miniPicture.css({
//         visibility: "visible",
//         opacity: 1,
//       }).html(`<a href="${$(this).data("target-url")}">
//                         <img src="${$(this).data("thumbnail-url")}" alt="${
//         $(this).hasClass("arrow-left") ? "Photo précédente" : "Photo suivante"
//       }">
//                     </a>`);
//     },
//     function () {
//       miniPicture.css({
//         visibility: "hidden",
//         opacity: 0,
//       });
//     }
//   );

//   $(".arrow-left, .arrow-right").click(function () {
//     window.location.href = $(this).data("target-url");
//   });
// });

// $(document).ready(function () {
//   const miniPicture = $("#miniPicture");

//   $(".arrow-left, .arrow-right").hover(
//     function () {
//       // Chargez dynamiquement la miniature et affichez-la
//       const thumbnailContainer = $(this).find(".thumbnail-container");
//       const targetUrl = $(this).data("target-url");

//       // Appel AJAX pour récupérer la miniature
//       $.ajax({
//         url: targetUrl,
//         type: "GET",
//         success: function (data) {
//           const thumbnailUrl = $(data).find(".detailPhoto img").attr("src");

//           thumbnailContainer.html(
//             `<img src="${thumbnailUrl}" alt="Thumbnail">`
//           );
//         },
//       });

//       miniPicture.css({
//         visibility: "visible",
//         opacity: 1,
//       });
//     },
//     function () {
//       miniPicture.css({
//         visibility: "hidden",
//         opacity: 0,
//       });
//     }
//   );

//   $(".arrow-left, .arrow-right").click(function () {
//     window.location.href = $(this).data("target-url");
//   });
// });

jQuery(document).ready(function ($) {
  // Cachez la miniature de la première photo au début
  $(".thumbnail:first-child img").hide();

  // Effet de survol sur la flèche gauche
  $(".arrow-left").hover(
    function () {
      var prevThumbnail = $(".thumbnail.active").prev();
      if (prevThumbnail.length > 0) {
        // Affiche la miniature de la photo précédente
        prevThumbnail.find("img").show();
      }
    },
    function () {
      // Cache la miniature au survol
      $(".thumbnail img").hide();
    }
  );

  // Effet de survol sur la flèche droite
  $(".arrow-right").hover(
    function () {
      var nextThumbnail = $(".thumbnail.active").next();
      if (nextThumbnail.length > 0) {
        // Affiche la miniature de la photo suivante
        nextThumbnail.find("img").show();
      }
    },
    function () {
      // Cache la miniature au survol
      $(".thumbnail img").hide();
    }
  );
});
