const dataModal = document.querySelector("#data-modal");
const dataBtn = document.querySelector(".data-modal-btn");
const dataCloseBtn = document.querySelector(".data-close");

dataBtn.onclick = function() {
  dataModal.style.display = "block";
};

dataCloseBtn.onclick = function() {
  dataModal.style.display = "none";
};

window.onclick = function(e) {
  if (e.target === dataModal) {
    dataModal.style.display = "none";
  }
};
