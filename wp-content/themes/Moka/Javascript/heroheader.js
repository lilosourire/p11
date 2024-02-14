// scripts.js
document.addEventListener("DOMContentLoaded", function () {
  var relatedPhotoContainers = document.querySelectorAll(".related-photo");

  relatedPhotoContainers.forEach(function (container) {
    var overlay = document.createElement("div");
    overlay.className = "singlePhotoOverlay";

    var infoIcon = document.createElement("div");
    infoIcon.className = "info-icon center-icon";
    infoIcon.innerHTML =
      '<img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/imagewebp/icon_info.png" alt="Icone info">';
    overlay.appendChild(infoIcon);

    var fullscreenIcon = document.createElement("div");
    fullscreenIcon.className = "fullscreen-icon center-icon";
    fullscreenIcon.innerHTML =
      '<img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/imagewebp/fullscreen.png" alt="Icone fullscreen">';
    overlay.appendChild(fullscreenIcon);

    container.appendChild(overlay);

    container.addEventListener("mouseenter", function () {
      overlay.style.opacity = "0.8";
      overlay.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
    });

    container.addEventListener("mouseleave", function () {
      overlay.style.opacity = "0";
      overlay.style.backgroundColor = "rgba(0, 0, 0, 0)";
    });
  });
});
