// Navbar stick on scroll ++ styles

var navbar = document.querySelector("[navbar-main]");

window.onscroll = function () {
  let blur = navbar.getAttribute("navbar-scroll");
  if (blur == "true") stickyNav();
};

function stickyNav() {
  if (window.scrollY >= 5) {
    navbar.classList.add("sticky", "top-[1%]", "backdrop-saturate-200", "backdrop-blur-2xl", "bg-white/80", "dark:bg-gray-950/80", "shadow-blur", "dark:shadow-dark-blur", "z-110");
  } else {
    navbar.classList.remove("sticky", "top-[1%]", "backdrop-saturate-200", "backdrop-blur-2xl", "bg-white/80", "dark:bg-gray-950/80", "shadow-blur", "dark:shadow-dark-blur", "z-110");
  }
}
