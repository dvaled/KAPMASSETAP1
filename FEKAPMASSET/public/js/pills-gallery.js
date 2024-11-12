var total = document.querySelectorAll("[nav-pills]");

if (total[0]) {
  total.forEach((nav_pills) => {
    var gallery = document.querySelector("[" + nav_pills.getAttribute("aria-controls") + "]");

    var links = nav_pills.querySelectorAll("li a[nav-link]");

    links.forEach((link) => {
      link.addEventListener("click", function () {
        var selected_image = gallery.querySelector("#" + link.getAttribute("aria-controls"));

        if (!selected_image.hasAttribute("active")) {
          let active_link = nav_pills.querySelector("li a[nav-link][active]");
          let active_image = gallery.querySelector("#" + active_link.getAttribute("aria-controls"));

          active_image.classList.add("opacity-0");
          active_image.classList.remove("block");
          setTimeout(function () {
            active_image.classList.add("hidden");
            //   your code to be executed after .15 second
          }, 150);

          setTimeout(function () {
            selected_image.classList.remove("hidden");
            //     //your code to be executed after .15 second
          }, 150);
          selected_image.classList.remove("opacity-0");
          selected_image.classList.add("block");

          active_image.removeAttribute("active");
          selected_image.setAttribute("active", "true");
        }
      });
    });
  });
}
