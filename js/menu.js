/* global bootstrap: false */
(function () {
    'use strict'
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })
  })()
  
  // function toggleSidebar() {
  //   var sidebar = document.getElementById("sidebar");
  //   sidebar.classList.toggle("hidden");
  // }

  const containerIcon = document.querySelector('.container-icon');
  const sidebar = document.getElementById('sidebar');
  containerIcon.addEventListener('click', function() {
    sidebar.classList.toggle('hidden');
  });

