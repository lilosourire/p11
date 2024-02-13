// console.log("le js de la nav est appellé correctement");
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
