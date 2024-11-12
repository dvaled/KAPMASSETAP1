var expand_trigger = document.querySelector("[nav-collapse-trigger]");
var bar1 = document.querySelector("[bar1]");
var bar2 = document.querySelector("[bar2]");
var bar3 = document.querySelector("[bar3]");

var menu = expand_trigger.nextElementSibling;

expand_trigger.addEventListener("click", function () {
  if (expand_trigger.getAttribute("aria-expanded") == "false") {

    menu.classList.remove("lg-max:hidden");
    setTimeout(function () {
      menu.classList.remove("lg-max:max-h-0");
      menu.classList.add("lg-max:max-h-116");
    }, 50);
    
    expand_trigger.setAttribute("aria-expanded", "true");
  } else {
    
    menu.classList.remove("lg-max:max-h-116");
    menu.classList.add("lg-max:max-h-0");
    setTimeout(function () {
    }, 200);
    setTimeout(function () {
      menu.classList.add("lg-max:hidden");
    }, 500);
    
    expand_trigger.setAttribute("aria-expanded", "false");
  }

  bar1.classList.toggle("rotate-45");
  bar1.classList.toggle("mt-1");

  bar2.classList.toggle("opacity-0");

  bar3.classList.toggle("-rotate-45");
  bar3.classList.toggle("mt-0.75");
  bar3.classList.toggle("mt-1.75");
});

var triggers = document.querySelectorAll("[nav-dropdown-trigger]");

triggers.forEach(trigger => {
  trigger.addEventListener("click", function () {
    if (this.getAttribute("aria-expanded") == "false"){
      let triggers = this.closest("ul").querySelectorAll("[nav-dropdown-trigger]");
      triggers.forEach(trigger => {
        if (trigger.getAttribute("aria-expanded") == "true") {
          let menu = trigger.nextElementSibling;
          menu.classList.add("lg-max:h-0")
          menu.classList.add("lg-max:opacity-0")
          menu.classList.add("lg-max:pointer-events-none")
          menu.classList.remove("lg-max:h-64")
          menu.classList.remove("lg-max:opacity-100")
          menu.classList.remove("lg-max:pointer-events-auto")
          trigger.setAttribute("aria-expanded","false");
        }
      });
      let menu = this.nextElementSibling;
      menu.classList.add("lg-max:h-64")
      menu.classList.add("lg-max:opacity-100")
      menu.classList.add("lg-max:pointer-events-auto")
      menu.classList.remove("lg-max:h-0")
      menu.classList.remove("lg-max:opacity-0")
      menu.classList.remove("lg-max:pointer-events-none")
      this.setAttribute("aria-expanded","true");
    } else {
      let menu = this.nextElementSibling;
      menu.classList.add("lg-max:h-0")
      menu.classList.add("lg-max:opacity-0")
      menu.classList.add("lg-max:pointer-events-none")
      menu.classList.remove("lg-max:h-64")
      menu.classList.remove("lg-max:opacity-100")
      menu.classList.remove("lg-max:pointer-events-auto")
      this.setAttribute("aria-expanded","false");
    }
  })
});