console.log("le js du menu burger est appellé correctement");

$(document).ready(function () {
  const header = $("header");
  const menuBurger = $(".burgerMenu");
  const nav = $(".navigation");
  const menuLinks = $(".menuNavigation li a");

  menuBurger.on("click", function () {
    const isOpen = header.hasClass("open");

    header.toggleClass("open", !isOpen);
    menuBurger.toggleClass("open", !isOpen);
    nav.toggleClass("open", !isOpen);
  });
});
