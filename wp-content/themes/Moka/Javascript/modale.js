// création du js pour la modale
console.log("modale-contact.js chargé");

// Code pour ouvrir la modale
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
