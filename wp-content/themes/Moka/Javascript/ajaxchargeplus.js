document.addEventListener("DOMContentLoaded", function () {
  var button = document.getElementById("plusDImage");
  var imagesContainer = document.getElementById("imagesContainer");
  var page = 1;

  button.addEventListener("click", function () {
    console.log("Bouton 'Charger plus' cliqué");

    var xhr = new XMLHttpRequest();
    var data = new FormData();

    data.append("action", "load_more");
    data.append("page", page);
    data.append("query", JSON.stringify(ajaxloadmore.query_vars));

    xhr.open("POST", ajax_object.ajax_url, true);

    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        console.log("Réponse du serveur :", response);

        if (response !== "no_posts") {
          page++;
          imagesContainer.insertAdjacentHTML("beforeend", response);
        } else {
          button.remove();
        }
      } else {
        console.error("Erreur lors de la requête AJAX");
      }

      button.innerText = "Charger plus";
    };

    xhr.onerror = function () {
      console.error("Erreur lors de la requête AJAX");
      button.innerText = "Erreur";
    };

    xhr.send(data);

    button.innerText = "Chargement...";
  });
});
