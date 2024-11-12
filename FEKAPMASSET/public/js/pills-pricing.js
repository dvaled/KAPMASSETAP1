if(document.querySelector("[nav-pills]")){
  var nav_pills = document.querySelector("[nav-pills]");

  var plans = document.querySelectorAll("[" + nav_pills.getAttribute("aria-controls") + "]");

  var links = nav_pills.querySelectorAll("li a[nav-link]");

  links.forEach((link) => {
    link.addEventListener("click", function () {

      var selected_link = plans[0].querySelector("[" + link.getAttribute("aria-controls") + "]");

      if (!selected_link.hasAttribute("active")) {
        let active_link = nav_pills.querySelector("li a[nav-link][active]");

        plans.forEach(plan => {
          
          let active_plan = plan.querySelector("[" + active_link.getAttribute("aria-controls") + "]");
          let selected_plan = plan.querySelector("[" + link.getAttribute("aria-controls") + "]");
          
          active_plan.classList.add("hidden");
          selected_plan.classList.remove("hidden");
          
          active_plan.removeAttribute("active");
          selected_plan.setAttribute("active", "true");
        });
      }
    });
  });
  
}
