
var nested_menu_triggers = document.querySelectorAll("[nav-nested-menu-trigger]");

nested_menu_triggers.forEach(trigger => {
    trigger.addEventListener("mouseenter", function() {
        let menu = this.querySelector("[nav-nested-menu]");
        menu.classList.remove("lg:opacity-0");
        menu.classList.remove("lg:pointer-events-none");
        menu.classList.remove("lg:before:left-0");
        menu.classList.add("lg:before:-left-2");
        menu.classList.add("lg:pointer-events-auto");
        menu.classList.add("lg:opacity-100");
    })
});

nested_menu_triggers.forEach(trigger => {
    trigger.addEventListener("mouseleave", function(){
        let menu = this.querySelector("[nav-nested-menu]");
        menu.classList.remove("lg:opacity-100");
        menu.classList.remove("lg:pointer-events-auto");
        menu.classList.remove("lg:before:-left-2");
        menu.classList.add("lg:before:left-0");
        menu.classList.add("lg:opacity-0");
        menu.classList.add("lg:pointer-events-none");
    })
});