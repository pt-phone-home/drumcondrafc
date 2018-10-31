const sideNavBtn = document.querySelector(".sidenav-btn");
const sideNavMenu = document.querySelector(".sidebar-nav");
const body1 = document.querySelector(".body");

sideNavBtn.onclick = function() {
  sideNavMenu.style.display = "block";
};

window.onclick = function(e) {
  if (e.target == body1) {
    sideNavMenu.style.display = "none";
  }
};
