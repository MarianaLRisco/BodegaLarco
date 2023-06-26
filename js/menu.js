/* global bootstrap: false */
(function () {
  "use strict";
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl);
  });
})();


const containerIcon = document.querySelector(".container-icon");
const sidebar = document.getElementById("sidebar");
const containerInfo = document.querySelector(".container-lg");

function updateContainerInfoMarginH() {
  const width = window.matchMedia("(max-width: 750px)").matches ? "40px" :
    window.matchMedia("(max-width: 1200px)").matches ? "85px" : "120px";
  containerInfo.style.marginLeft = width;
}

function updateContainerInfoMargin() {
  const width = window.matchMedia("(max-width: 750px)").matches ? "80px" :
    window.matchMedia("(max-width: 1500px)").matches ? "120px" : "230px";
  containerInfo.style.marginLeft = width;
}

containerIcon.addEventListener("click", function () {
  sidebar.classList.toggle("hidden");
  if (sidebar.classList.contains("hidden")) {
    updateContainerInfoMarginH();
    sidebar.classList.remove("visible");
  } else {
    updateContainerInfoMargin();
    sidebar.classList.add("visible");
  }
});

window.addEventListener("load", updateContainerInfoMarginH);
window.addEventListener("resize", updateContainerInfoMarginH);
window.addEventListener("load", updateContainerInfoMargin);
window.addEventListener("resize", updateContainerInfoMargin);
