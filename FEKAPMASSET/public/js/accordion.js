var accordion = document.querySelector("[accordion]");

var sections = accordion.querySelectorAll("[accordion-section]");

sections.forEach(section => {
  let trigger = section.querySelector("[section-trigger]");
  trigger.addEventListener("click", function () {
    if (this.getAttribute("aria-expanded") == "true") {
      this.setAttribute("aria-expanded", "false");
    } else {
      let accordion = this.closest("[accordion]");
      let triggers = accordion.querySelectorAll("[section-trigger]");
      triggers.forEach(trigger => {
        trigger.setAttribute("aria-expanded", "false");
      });
      this.setAttribute("aria-expanded", "true");
    }
    init(sections);
  });
});

//initialization max height
init(sections)

function init(sections) {
  sections.forEach(section => {
    let content = section.querySelector("[section-content]");
    let trigger = section.querySelector("[section-trigger]");
    if(trigger.getAttribute("aria-expanded") == "true"){
      if(trigger.querySelector("[section-close-icon]")){
        let close_icon = trigger.querySelector("[section-close-icon]");
        close_icon.classList.remove("hidden");
      }
      if(trigger.querySelector("[section-open-icon]")){
        let open_icon = trigger.querySelector("[section-open-icon]");
        open_icon.classList.add("hidden");
      }
      trigger.classList.remove("text-slate-500")
      trigger.classList.add("text-slate-700")
      content.style.maxHeight = content.scrollHeight + "px";
    } else {
      if(trigger.querySelector("[section-open-icon]")){
        let open_icon = trigger.querySelector("[section-open-icon]");
        open_icon.classList.remove("hidden");
      }
      if(trigger.querySelector("[section-close-icon]")){
        let close_icon = trigger.querySelector("[section-close-icon]");
        close_icon.classList.add("hidden");
      }
      trigger.classList.remove("text-slate-700")
      trigger.classList.add("text-slate-500")
      content.style.maxHeight = "0px";
    }
  });
}
