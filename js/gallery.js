const current = document.querySelector("#current");
const imgs = document.querySelectorAll(".imgs img");
const opacity = 0.4;

// set first image opacity

imgs[0].style.opacity = opacity;

imgs.forEach(img => img.addEventListener("click", imgClick));

function imgClick(e) {
  // reset opacity of all images

  imgs.forEach(img => (img.style.opacity = 1));

  // change current image to src of clicked img
  current.src = e.target.src;

  // add fade-in class

  current.classList.add("fade-in");

  // remove fade in class

  setTimeout(() => current.classList.remove("fade-in"), 500);

  // change opacity to opacity variable

  e.target.style.opacity = opacity;
}
