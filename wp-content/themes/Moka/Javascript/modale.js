// Attend que le contenu de la page soit entièrement chargé
// document.addEventListener("DOMContentLoaded", function () {
//   // Récupère la modale et le bouton de fermeture
//   var modal = document.querySelector(".popup-overlay");
//   var closeButton = document.querySelector(".popup-contact .close-button");

//   // Fonction pour afficher la modale
//   function openModal() {
//     modal.style.display = "block";
//   }

//   // Fonction pour masquer la modale
//   function closeModal() {
//     modal.style.display = "none";
//   }

//   // Événement pour afficher la modale
//   // Vous pouvez déclencher cet événement comme vous le souhaitez (par exemple, au clic sur un bouton)
//   openModal();

//   // Événement pour masquer la modale lorsque l'utilisateur clique sur le bouton de fermeture
//   closeButton.addEventListener("click", closeModal);

//   // Événement pour masquer la modale lorsque l'utilisateur clique en dehors de celle-ci
//   window.addEventListener("click", function (event) {
//     if (event.target === modal) {
//       closeModal();
//     }
//   });
// });

// document.addEventListener("DOMContentLoaded", function () {
//   // Récupère la modale et le bouton de fermeture
//   var modal = document.querySelector(".popup-overlay");
//   var closeButton = document.querySelector(".popup-contact .close-button");

//   // Vérifie si l'élément modal existe
//   if (!modal) {
//     console.error("L'élément modal n'a pas été trouvé.");
//     return; // Arrête l'exécution du script
//   }

//   // Fonction pour afficher la modale
//   function openModal() {
//     modal.style.display = "block";
//   }

//   // Fonction pour masquer la modale
//   function closeModal() {
//     modal.style.display = "none";
//   }

// Événement pour afficher la modale
//   // Vous pouvez déclencher cet événement comme vous le souhaitez (par exemple, au clic sur un bouton)
//   openModal();

//   // Événement pour masquer la modale lorsque l'utilisateur clique sur le bouton de fermeture
//   if (closeButton) {
//     closeButton.addEventListener("click", closeModal);
//   } else {
//     console.error("Le bouton de fermeture n'a pas été trouvé.");
//   }

//   // Événement pour masquer la modale lorsque l'utilisateur clique en dehors de celle-ci
//   window.addEventListener("click", function (event) {
//     if (event.target === modal) {
//       closeModal();
//     }
//   });
// });

console.log("modale-contact.js chargé");

// document.addEventListener("DOMContentLoaded", function () {
//   const openModalButton = document.getElementById("open-modal-button");
//   const overlay = document.querySelector(".popup-overlay");

//   // Événement au clic sur le lien "Contact"
//   document
//     .getElementById("header-menu")
//     .addEventListener("click", function (event) {
//       if (event.target.id === "contact-modale") {
//         event.preventDefault();
//         overlay.classList.add("open");
//       }
//     });

//   // Fermer la modale lorsque l'overlay est cliqué
//   overlay.addEventListener("click", function (event) {
//     if (event.target === overlay) {
//       overlay.classList.remove("open");
//     }
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  const overlay = document.querySelector(".popup-overlay");

  // Fonction pour ouvrir la modale
  function openModal() {
    overlay.classList.add("open");
  }

  // Événement au clic sur le lien "Contact"
  //get element by class
  var x = document.getElementsByClassName("contact-modale");
  //add id to element by class
  x[0].setAttribute("id", "contact-modale");
  document
    .getElementById("contact-modale")
    .addEventListener("click", function (event) {
      event.preventDefault();
      openModal(); // Appelle la fonction pour ouvrir la modale
    });

  // Fermer la modale lorsque l'overlay est cliqué
  overlay.addEventListener("click", function (event) {
    if (event.target === overlay) {
      overlay.classList.remove("open");
    }
  });
});
