// création du js pour la modale
console.log("modale-contact.js chargé");

// Code pour ouvrir la modale
document.addEventListener("DOMContentLoaded", function () {
  const overlay = document.querySelector(".popup-overlay");

  // Fonction pour ouvrir la modale
  function openModal() {
    overlay.classList.add("open");
  }

  // Événement au clic sur le bouton "Contact" du menue header
  //get element by class
  var x = document.getElementsByClassName("contact-modale");
  //add id to element by class
  x[0].setAttribute("id", "contact-modale-header");
  document
    .getElementById("contact-modale-header")
    .addEventListener("click", function (event) {
      event.preventDefault();
      openModal(); // Appelle la fonction pour ouvrir la modale
    });
  // Événement au clic sur le bouton "Contact" dans la section "contact"
  var contactButton = document.getElementById("contact-modale");
  if (contactButton) {
    contactButton.addEventListener("click", function (event) {
      event.preventDefault();
      openModal();
    });
  }
  // Fermer la modale lorsque l'overlay est cliqué
  overlay.addEventListener("click", function (event) {
    if (event.target === overlay) {
      overlay.classList.remove("open");
    }
  });
});
