console.log("le js du menu burger est appellé correctement");
// Définition de la fonction showResponsiveMenu
function showResponsiveMenu() {
  // Récupération de l'élément du menu responsive par son ID
  var menu = document.getElementById("topnav_responsive_menu");

  // Récupération de l'icône du menu hamburger par son ID
  var icon = document.getElementById("IconeMenuBurger");

  // Récupération de l'élément racine du document par son ID
  var root = document.getElementById("root");

  // Vérification de la classe actuelle du menu
  if (menu.className === "") {
    // Si le menu est actuellement fermé, ajouter les classes et ajuster le style
    menu.className = "open";
    icon.className = "open";
    root.style.overflowY = "hidden"; // Empêche le défilement vertical
  } else {
    // Si le menu est actuellement ouvert, supprimer les classes et réinitialiser le style
    menu.className = "";
    icon.className = "";
    root.style.overflowY = ""; // Rétablit le défilement vertical
  }
}
