
let triggers = document.querySelectorAll("[data-toggle='modal']");
triggers.forEach(trigger => {
    let modal = document.querySelector(trigger.getAttribute("data-target"));
    trigger.addEventListener("click", function () {
        console.log(modal.getAttribute("aria-hidden"));
        if(modal.getAttribute("aria-hidden") == "true"){
            modal.setAttribute("aria-hidden", "false")
            let modal_backdrop = document.createElement("div")
            modal_backdrop.classList.add("opacity-0", "z-990", "fixed", "bg-black", "top-0", "left-0", "w-screen", "h-screen", "transition-opacity", "ease-linear");
            modal_backdrop.setAttribute("modal-backdrop", trigger.getAttribute("data-target"));
            document.body.appendChild(modal_backdrop);
            modal_backdrop.classList.add("opacity-50");
            modal_backdrop.classList.remove("opacity-0");
        } else {
            modal.setAttribute("aria-hidden", "true")
            let backdrop = document.querySelector("[modal-backdrop='"+ trigger.getAttribute("data-target") +"']")
            backdrop.remove();
        }
        modal.classList.toggle("hidden");
        modal.classList.toggle("opacity-0");
        modal.classList.toggle("block");
        
        modal.firstElementChild.classList.toggle("-translate-y-13");
        modal.firstElementChild.classList.toggle("transform-none");
    });

});
