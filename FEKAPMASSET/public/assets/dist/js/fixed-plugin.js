var pageName = window.location.pathname.split("/").pop().split(".")[0];

var fixedPlugin = document.querySelector("[fixed-plugin]");
var fixedPluginButton = document.querySelector("[fixed-plugin-button]");
var fixedPluginButtonNav = document.querySelector("[fixed-plugin-button-nav]");
var fixedPluginCard = document.querySelector("[fixed-plugin-card]");
var fixedPluginCloseButton = document.querySelector("[fixed-plugin-close-button]");

var navbar = document.querySelector("[navbar-main]");

var buttonNavbarFixed = document.querySelector("[navbar-fixed-toggle]");

var sidenav = document.querySelector("aside");
var sidenav_icons = sidenav.querySelectorAll("li a div");

var sidenav_target = "../pages/" + pageName + ".html";

var transparentBtn = document.querySelector("[transparent-style-btn]");
var whiteBtn = document.querySelector("[white-style-btn]");

var non_active_style = ["bg-none", "bg-transparent", "text-fuchsia-500", "border-fuchsia-500"];
var active_style = ["bg-gradient-to-tl", "from-purple-700", "to-pink-500", "bg-fuchsia-500", "text-white", "border-transparent"];

var transparent_sidenav_classes = ["xl:bg-transparent", "shadow-none"];
var transparent_sidenav_highlighted = ["shadow-soft-xl"];
var transparent_sidenav_icons = ["bg-white"];

var white_sidenav_classes = ["xl:bg-white", "xl:shadow-soft-xl"];
var white_sidenav_highlighted = ["shadow-none"];
var white_sidenav_icons = ["bg-gray-200"];

var sidenav_highlight = document.querySelector("a[active_primary]");

// fixed plugin toggle
if (pageName != "rtl-page") {
  fixedPluginButton.addEventListener("click", function () {
    fixedPluginCard.classList.toggle("-right-90");
    fixedPluginCard.classList.toggle("right-0");
  });

  fixedPluginButtonNav.addEventListener("click", function () {
    fixedPluginCard.classList.toggle("-right-90");
    fixedPluginCard.classList.toggle("right-0");
  });

  fixedPluginCloseButton.addEventListener("click", function () {
    fixedPluginCard.classList.toggle("-right-90");
    fixedPluginCard.classList.toggle("right-0");
  });

  window.addEventListener("click", function (e) {
    if (!fixedPlugin.contains(e.target) && !fixedPluginButton.contains(e.target) && !fixedPluginButtonNav.contains(e.target)) {
      if (fixedPluginCard.classList.contains("right-0")) {
        fixedPluginCloseButton.click();
      }
    }
  });
} else {
  fixedPluginButton.addEventListener("click", function () {
    fixedPluginCard.classList.toggle("-left-90");
    fixedPluginCard.classList.toggle("left-0");
  });

  fixedPluginButtonNav.addEventListener("click", function () {
    fixedPluginCard.classList.toggle("-left-90");
    fixedPluginCard.classList.toggle("left-0");
  });

  fixedPluginCloseButton.addEventListener("click", function () {
    fixedPluginCard.classList.toggle("-left-90");
    fixedPluginCard.classList.toggle("left-0");
  });

  window.addEventListener("click", function (e) {
    if (!fixedPlugin.contains(e.target) && !fixedPluginButton.contains(e.target) && !fixedPluginButtonNav.contains(e.target)) {
      if (fixedPluginCard.classList.contains("left-0")) {
        fixedPluginCloseButton.click();
      }
    }
  });
}

// color sidenav

function sidebarColor(a) {
  var color_from = a.getAttribute("data-color-from");
  var color_to = a.getAttribute("data-color-to");
  var parent = a.parentElement.children;
  
  var activeColorFrom;
  var activeColorTo;
  var activeSidenavIconColorClassFrom;
  var activeSidenavIconColorClassTo;
  var activeSidenavCardColorClassFrom;
  var activeSidenavCardColorClassTo;
  var activeSidenavCardIconColorClassFrom;
  var activeSidenavCardIconColorClassTo;
  
  var checkedSidenavIconColorFrom = "from-" + color_from;
  var checkedSidenavIconColorTo = "to-" + color_to;
  
  var checkedSidenavCardColorFrom = "after:from-" + (color_from == "purple-700" ? "slate-600" : color_from);
  var checkedSidenavCardColorTo = "after:to-" + (color_to == "pink-500" ? "slate-300" : color_to);
  
  var checkedSidenavCardIconColorClassFrom = "from-" + (color_from == "purple-700" ? "slate-600" : color_from);
  var checkedSidenavCardIconColorClassTo = "to-" + (color_to == "pink-500" ? "slate-300" : color_to);

  var sidenavCard = document.querySelector("[sidenav-card]");
  var sidenavCardIcon = document.querySelector("[sidenav-card-icon]");
  var sidenavIcon = sidenav_highlight.firstElementChild;

  for (var i = 0; i < parent.length; i++) {
    if (parent[i].hasAttribute("active-color")) {
      activeColorFrom = parent[i].getAttribute("data-color-from");
      activeColorTo = parent[i].getAttribute("data-color-to");

      parent[i].classList.toggle("border-white");
      parent[i].classList.toggle("border-slate-700");
      
      activeSidenavIconColorClassFrom = "from-" + activeColorFrom;
      activeSidenavIconColorClassTo = "to-" + activeColorTo;

      activeSidenavIconColorClassFrom = "from-" + activeColorFrom;
      activeSidenavIconColorClassTo = "to-" + activeColorTo;

      activeSidenavCardIconColorClassFrom = "from-" + (activeColorFrom == "purple-700" ? "slate-600" : activeColorFrom);
      activeSidenavCardIconColorClassTo = "to-" + (activeColorTo == "pink-500" ? "slate-300" : activeColorTo);
    }
    parent[i].removeAttribute("active-color");
  }

  var att = document.createAttribute("active-color");

  a.setAttributeNode(att);
  a.classList.toggle("border-white");
  a.classList.toggle("border-slate-700");

  sidenavCard.classList.remove(activeSidenavCardColorClassFrom);
  sidenavCard.classList.remove(activeSidenavCardColorClassTo);
  
  sidenavCardIcon.classList.remove(activeSidenavCardIconColorClassFrom);
  sidenavCardIcon.classList.remove(activeSidenavCardIconColorClassTo);
  
  sidenavIcon.classList.remove(activeSidenavIconColorClassFrom);
  sidenavIcon.classList.remove(activeSidenavIconColorClassTo);
  
  sidenavCard.classList.add(checkedSidenavCardColorFrom);
  sidenavCard.classList.add(checkedSidenavCardColorTo);
  
  sidenavCardIcon.classList.add(checkedSidenavCardIconColorClassFrom);
  sidenavCardIcon.classList.add(checkedSidenavCardIconColorClassTo);
  
  sidenavIcon.classList.add(checkedSidenavIconColorFrom);
  sidenavIcon.classList.add(checkedSidenavIconColorTo);
}

// sidenav style

transparentBtn.addEventListener("click", function () {
  const active_style_attr = document.createAttribute("active-style");
  if (!this.hasAttribute(active_style_attr)) {
    // change trigger buttons style

    this.setAttributeNode(active_style_attr);

    non_active_style.forEach((style_class) => {
      this.classList.remove(style_class);
    });

    active_style.forEach((style_class) => {
      this.classList.add(style_class);
    });

    whiteBtn.removeAttribute(active_style_attr);

    active_style.forEach((style_class) => {
      whiteBtn.classList.remove(style_class);
    });

    non_active_style.forEach((style_class) => {
      whiteBtn.classList.add(style_class);
    });

    // change actual styles

    white_sidenav_classes.forEach((style_class) => {
      sidenav.classList.remove(style_class);
    });
    transparent_sidenav_classes.forEach((style_class) => {
      sidenav.classList.add(style_class);
    });

    white_sidenav_highlighted.forEach((style_class) => {
      sidenav_highlight.classList.remove(style_class);
    });
    transparent_sidenav_highlighted.forEach((style_class) => {
      sidenav_highlight.classList.add(style_class);
    });
    for (var i = 0; i < sidenav_icons.length; i++) {
      white_sidenav_icons.forEach((style_class) => {
        sidenav_icons[i].classList.remove(style_class);
      });
      transparent_sidenav_icons.forEach((style_class) => {
        sidenav_icons[i].classList.add(style_class);
      });
    }
  }
});

whiteBtn.addEventListener("click", function () {
  const active_style_attr = document.createAttribute("active-style");
  if (!this.hasAttribute(active_style_attr)) {
    this.setAttributeNode(active_style_attr);
    non_active_style.forEach((style_class) => {
      this.classList.remove(style_class);
    });
    active_style.forEach((style_class) => {
      this.classList.add(style_class);
    });

    transparentBtn.removeAttribute(active_style_attr);
    active_style.forEach((style_class) => {
      transparentBtn.classList.remove(style_class);
    });
    non_active_style.forEach((style_class) => {
      transparentBtn.classList.add(style_class);
    });

    // change actual styles

    transparent_sidenav_classes.forEach((style_class) => {
      sidenav.classList.remove(style_class);
    });
    white_sidenav_classes.forEach((style_class) => {
      sidenav.classList.add(style_class);
    });

    transparent_sidenav_highlighted.forEach((style_class) => {
      sidenav_highlight.classList.remove(style_class);
    });

    white_sidenav_highlighted.forEach((style_class) => {
      sidenav_highlight.classList.add(style_class);
    });

    for (var i = 0; i < sidenav_icons.length; i++) {
      transparent_sidenav_icons.forEach((style_class) => {
        sidenav_icons[i].classList.remove(style_class);
      });
      white_sidenav_icons.forEach((style_class) => {
        sidenav_icons[i].classList.add(style_class);
      });
    }
  }
});

// navbar fixed plugin

if (navbar) {
  if (navbar.getAttribute("navbar-scroll") == "true") {
    buttonNavbarFixed.setAttribute("checked", "true");
  }
  buttonNavbarFixed.addEventListener("change", function () {
    if (this.checked) {
      navbar.setAttribute("navbar-scroll", "true");
      navbar.classList.add("sticky", "top-[1%]", "backdrop-saturate-200", "backdrop-blur-2xl", "bg-white/80", "shadow-blur", "z-110", "dark:bg-gray-950/80", "dark:shadow-dark-blur");
    } else {
      navbar.setAttribute("navbar-scroll", "false");
      navbar.classList.remove("sticky", "top-[1%]", "backdrop-saturate-200", "backdrop-blur-2xl", "bg-white/80", "shadow-blur", "z-110", "dark:bg-gray-950/80", "dark:shadow-dark-blur");
    }
  });
} else {
  // buttonNavbarFixed.setAttribute("checked", "true");
  buttonNavbarFixed.setAttribute("disabled", "true");
}

var sidenav = document.querySelector("aside");
var mini_sidenav_burger = document.querySelector("[mini-sidenav-burger]");
var burger_mini = mini_sidenav_burger.firstElementChild;
var top_bread_mini = burger_mini.firstElementChild;
var main = document.querySelector("main");
if (!main) {
  var main = document.querySelector("[main-content]");
}
var bottom_bread_mini = burger_mini.lastElementChild;
var normal_spans = sidenav.querySelectorAll("span:not(.opacity-0)");
var mini_spans = sidenav.querySelectorAll("span.opacity-0");
var primary_lists = sidenav.querySelectorAll("ul.pl-4.ml-6");
var secondary_lists = sidenav.querySelectorAll("ul.pl-0");
var primary_anchors = sidenav.querySelectorAll("a[collapse_trigger='primary']");
var sidenav_card_icon = sidenav.querySelector("[sidenav-card-icon]").parentElement;
var sidenav_card_content = sidenav.querySelector("i[sidenav-card-icon]").parentElement.nextElementSibling;
var mini_sidenav_toggle = document.querySelector("[sidenav-mini-toggle]");

mini_sidenav_burger.addEventListener("click", function (e) {
  mini_sidenav_toggle.click();
});

mini_sidenav_toggle.addEventListener("change", toggle_sidenav_mini);

function toggle_sidenav_mini() {
  if (pageName != "rtl-page") {
    
    if (sidenav.getAttribute("mini") == "true") {
      normal_sidenav();
      sidenav.setAttribute("mini", "false");
    } else {
      mini_sidenav();
      sidenav.setAttribute("mini", "true");
    }
  } else {
    
    if (sidenav.getAttribute("mini") == "true") {
      normal_sidenav_rtl();
      sidenav.setAttribute("mini", "false");
    } else {
      mini_sidenav_rtl();
      sidenav.setAttribute("mini", "true");
    }
  }
}

function mini_sidenav() {
  sidenav.classList.add("max-w-24");
  sidenav.classList.remove("max-w-64");
  // setTimeout(function () {
  sidenav.classList.add("overflow-hidden");
  sidenav.classList.remove("overflow-y-auto");
  //   your code to be executed after .1 second
  // }, 100);
  main.classList.add("xl:ml-30");
  main.classList.remove("xl:ml-68");
  primary_anchors.forEach((primary_anchor) => {
    primary_anchor.classList.remove("after:content-['\\f107']");
  });
  primary_lists.forEach((primary_list) => {
    primary_list.classList.add("pl-0", "ml-0");
    primary_list.classList.remove("pl-4", "ml-6");
  });
  secondary_lists.forEach((secondary_list) => {
    secondary_list.classList.add("ml-0");
  });
  normal_spans.forEach((normal_span) => {
    normal_span.classList.add("opacity-0");
    normal_span.classList.add("max-w-0");
    normal_span.classList.remove("opacity-100");
    if (normal_span.previousElementSibling.tagName.toLowerCase() == "span") {
      normal_span.parentElement.classList.add("before:content-[none]");
      normal_span.parentElement.classList.add("ml-4");
      normal_span.parentElement.classList.remove("before:content-['']");
      normal_span.parentElement.classList.remove("ml-5.4");
    }
  });

  mini_spans.forEach((mini_span) => {
    mini_span.classList.remove("opacity-0");
    mini_span.classList.add("ml-0.75");
    mini_span.classList.add("min-w-7");
    mini_span.classList.add("opacity-100");
  });
  sidenav_card_content.classList.add("opacity-0", "w-0", "h-0");
  sidenav_card_icon.classList.remove("mb-4");

  top_bread_mini.classList.remove("translate-x-[5px]");
  bottom_bread_mini.classList.remove("translate-x-[5px]");
}

function normal_sidenav() {
  sidenav.classList.add("max-w-64");
  sidenav.classList.remove("max-w-24");
  main.classList.add("xl:ml-68");
  main.classList.remove("xl:ml-30");
  sidenav_card_content.classList.remove("opacity-0", "w-0", "h-0");
  sidenav_card_icon.classList.add("mb-4");
  primary_anchors.forEach((primary_anchor) => {
    primary_anchor.classList.add("after:content-['\\f107']");
  });
  mini_spans.forEach((mini_span) => {
    mini_span.classList.remove("opacity-100");
    mini_span.classList.remove("min-w-7");
    mini_span.classList.remove("ml-0.75");
    mini_span.classList.add("opacity-0");
  });
  primary_lists.forEach((primary_list) => {
    primary_list.classList.remove("pl-0", "ml-0");
    primary_list.classList.add("pl-4", "ml-6");
  });
  secondary_lists.forEach((secondary_list) => {
    secondary_list.classList.remove("ml-0");
  });
  normal_spans.forEach((normal_span) => {
    normal_span.classList.remove("opacity-0");
    normal_span.classList.add("opacity-100");
    normal_span.classList.remove("max-w-0");
    if (normal_span.previousElementSibling.tagName.toLowerCase() == "span") {
      normal_span.parentElement.classList.remove("before:content-[none]");
      normal_span.parentElement.classList.add("before:content-['']");
      normal_span.parentElement.classList.add("ml-5.4");
      normal_span.parentElement.classList.remove("ml-4");
    } else if (normal_span.previousElementSibling.tagName.toLowerCase() != "img") {
    }
    normal_span.classList.add("opacity-100");
  });
  top_bread_mini.classList.add("translate-x-[5px]");
  bottom_bread_mini.classList.add("translate-x-[5px]");
  // setTimeout(function () {
  sidenav.classList.remove("overflow-hidden");
  sidenav.classList.add("overflow-y-auto");
  //   your code to be executed after .1 second
  // }, 100);
}

function mini_sidenav_rtl() {
  sidenav.classList.add("max-w-24");
  sidenav.classList.remove("max-w-64");
  // setTimeout(function () {
  sidenav.classList.add("overflow-hidden");
  sidenav.classList.remove("overflow-y-auto");
  //   your code to be executed after .1 second
  // }, 100);
  main.classList.add("xl:mr-30");
  main.classList.remove("xl:mr-68");
  primary_anchors.forEach((primary_anchor) => {
    primary_anchor.classList.remove("after:content-['\\f107']");
  });
  primary_lists.forEach((primary_list) => {
    primary_list.classList.add("pr-0", "mr-0");
    primary_list.classList.remove("pr-4", "mr-6");
  });
  secondary_lists.forEach((secondary_list) => {
    secondary_list.classList.add("mr-0");
  });
  normal_spans.forEach((normal_span) => {
    normal_span.classList.add("opacity-0");
    normal_span.classList.add("max-w-0");
    normal_span.classList.remove("opacity-100");
    if (normal_span.previousElementSibling.tagName.toLowerCase() == "span") {
      normal_span.parentElement.classList.add("before:content-[none]");
      normal_span.parentElement.classList.add("mr-4");
      normal_span.parentElement.classList.remove("before:content-['']");
      normal_span.parentElement.classList.remove("mr-5.4");
    }
  });

  mini_spans.forEach((mini_span) => {
    mini_span.classList.remove("opacity-0");
    mini_span.classList.add("mr-0.6");
    mini_span.classList.add("min-w-7");
    mini_span.classList.add("opacity-100");
  });
  sidenav_card_content.classList.add("opacity-0", "w-0", "h-0");
  sidenav_card_icon.classList.remove("mb-4");

  top_bread_mini.classList.remove("-translate-x-[5px]");
  bottom_bread_mini.classList.remove("-translate-x-[5px]");
}

function normal_sidenav_rtl() {
  sidenav.classList.add("max-w-64");
  sidenav.classList.remove("max-w-24");
  main.classList.add("xl:mr-68");
  main.classList.remove("xl:mr-30");
  sidenav_card_content.classList.remove("opacity-0", "w-0", "h-0");
  sidenav_card_icon.classList.add("mb-4");
  primary_anchors.forEach((primary_anchor) => {
    primary_anchor.classList.add("after:content-['\\f107']");
  });
  mini_spans.forEach((mini_span) => {
    mini_span.classList.remove("opacity-100");
    mini_span.classList.remove("min-w-7");
    mini_span.classList.remove("mr-0.6");
    mini_span.classList.add("opacity-0");
  });
  primary_lists.forEach((primary_list) => {
    primary_list.classList.remove("pr-0", "mr-0");
    primary_list.classList.add("pr-4", "mr-6");
  });
  secondary_lists.forEach((secondary_list) => {
    secondary_list.classList.remove("mr-0");
  });
  normal_spans.forEach((normal_span) => {
    normal_span.classList.remove("opacity-0");
    normal_span.classList.add("opacity-100");
    normal_span.classList.remove("max-w-0");
    if (normal_span.previousElementSibling.tagName.toLowerCase() == "span") {
      normal_span.parentElement.classList.remove("before:content-[none]");
      normal_span.parentElement.classList.add("before:content-['']");
      normal_span.parentElement.classList.add("mr-5.4");
      normal_span.parentElement.classList.remove("mr-4");
    } else if (normal_span.previousElementSibling.tagName.toLowerCase() != "img") {
    }
    normal_span.classList.add("opacity-100");
  });
  top_bread_mini.classList.add("-translate-x-[5px]");
  bottom_bread_mini.classList.add("-translate-x-[5px]");
  // setTimeout(function () {
  sidenav.classList.remove("overflow-hidden");
  sidenav.classList.add("overflow-y-auto");
  //   your code to be executed after .1 second
  // }, 100);
}

sidenav.addEventListener("mouseenter", () => {
  if (sidenav.getAttribute("mini") == "true") {
    if (pageName != "rtl-page") {
      normal_sidenav();
    } else {
      normal_sidenav_rtl();
    }
  }
});

sidenav.addEventListener("mouseleave", () => {
  if (sidenav.getAttribute("mini") == "true") {
    if (pageName != "rtl-page") {
      mini_sidenav();
    } else {
      mini_sidenav_rtl();
    }
  }
});

var dark_mode_toggle = document.querySelector("[dark-toggle]");
var root_html = document.querySelector("html");

dark_mode_toggle.addEventListener("change", function () {
  dark_mode_toggle.setAttribute("manual", "true");
  if (this.checked) {
    root_html.classList.add("dark");
  } else {
    root_html.classList.remove("dark");
  }
});

// function to set dark mode if user setting is for dark 

// if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
//   if (!dark_mode_toggle.hasAttribute("manual") && !root_html.classList.contains("dark")) {
//     dark_mode_toggle.click();
//     dark_mode_toggle.removeAttribute("manual");
//   }
// }

// function to automatically switch on dark mode

// window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", (event) => {
//   const actual_color_scheme = event.matches ? "dark" : "light";
//   if (actual_color_scheme == "dark" && !root_html.classList.contains("dark") && !dark_mode_toggle.hasAttribute("manual")) {
//     dark_mode_toggle.click();
//     dark_mode_toggle.removeAttribute("manual");
//   } else if (actual_color_scheme == "light" && root_html.classList.contains("dark") && !dark_mode_toggle.hasAttribute("manual")) {
//     dark_mode_toggle.click();
//     dark_mode_toggle.removeAttribute("manual");
//   }
// });
