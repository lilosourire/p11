jQuery(document).ready(function ($) {
  var relatedPhotoContainers = $(".related-photo");

  relatedPhotoContainers.each(function () {
    var overlay = $("<div>").addClass("singlePhotoOverlay");

    var infoIcon = $("<div>").addClass("info-icon center-icon");
    infoIcon.html(
      '<img src="' +
        ajax_params.template_directory_uri +
        '/image/imagewebp/icon_info.png" alt="Icone info">'
    );
    overlay.append(infoIcon);

    var fullscreenIcon = $("<div>").addClass("fullscreen-icon center-icon");
    fullscreenIcon.html(
      '<img src="' +
        ajax_params.template_directory_uri +
        '/image/imagewebp/fullscreen.png" alt="Icone fullscreen">'
    );
    overlay.append(fullscreenIcon);

    $(this).append(overlay);

    $(this).on("mouseenter", function () {
      overlay.css({ opacity: "0.8", backgroundColor: "rgba(0, 0, 0, 0.8)" });
    });

    $(this).on("mouseleave", function () {
      overlay.css({ opacity: "0", backgroundColor: "rgba(0, 0, 0, 0)" });
    });
  });
});
