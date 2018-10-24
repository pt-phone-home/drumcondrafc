const conductModal = document.querySelector("#conduct-modal");
const conductBtn = document.querySelector(".conduct-modal-btn");
const conductCloseBtn = document.querySelector(".conduct-close");

conductBtn.onclick = function() {
  conductModal.style.display = "block";
};

conductCloseBtn.onclick = function() {
  conductModal.style.display = "none";
};

window.onclick = function(e) {
  if (e.target == conductModal) {
    conductModal.style.display = "none";
  }
  if (e.target == dataModal) {
    dataModal.style.display = "none";
  }
};
