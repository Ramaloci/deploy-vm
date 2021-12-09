(() => {
  // src/js/hamburger.js
  document.getElementById("burger").addEventListener("click", function(e) {
    var elem = document.getElementById("burger");
    var nav = document.getElementById("navigation");
    if (elem.classList.contains("is-active")) {
      elem.classList.remove("is-active");
      nav.style.display = "none";
      nav.style.visibility = "hidden";
    } else {
      elem.classList.add("is-active");
      nav.style.display = "block";
      nav.style.visibility = "visible";
    }
  });
})();
