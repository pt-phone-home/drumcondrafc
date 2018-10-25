const sideNavBtn = document.querySelector(".sidenav-btn");
const sideNavMenu = document.querySelector(".sidebar-nav");


sideNavBtn.onclick = function() {
  sideNavMenu.style.display = "block";
};

window.onclick() = function(e) {
    if(e.target == sideNavMenu) {
        sideNavMenu.style.display = "none";
    }
}