var container = document.querySelector("[multisteps-form]");
var buttons = container.querySelectorAll("[aria-controls]");
var multisteps_form = container.querySelector("form");
var forms = container.querySelectorAll("form div[form]");
multisteps_form.style.height = forms[0].scrollHeight + "px";
var num = forms.length;
const active_btn_classes = ["before:scale-120", "before:bg-current", "text-slate-700"];
const inactive_btn_classes = ["before:bg-white", "text-slate-100"];
const active_form_classes = ["h-auto", "opacity-100", "visible"];
const inactive_form_classes = ["h-0", "opacity-0", "invisible"];

buttons.forEach((button) => {
  button.addEventListener("click", function () {
    let form_name = button.getAttribute("aria-controls");
    let asoc_form = container.querySelector("[form='" + form_name + "']");

    if (!asoc_form.hasAttribute("active")) {
      var done = false;
      for (let i = 0; i < num; i++) {
        var element = buttons[i];
        var current_form_name = element.getAttribute("aria-controls");
        var current_form = container.querySelector("form div[form='" + current_form_name + "']");
        if (!done) {
          active_btn_classes.forEach((class_name) => {
            element.classList.add(class_name);
          });
          inactive_btn_classes.forEach((class_name) => {
            element.classList.remove(class_name);
          });
        } else {
          inactive_btn_classes.forEach((class_name) => {
            element.classList.add(class_name);
          });
          active_btn_classes.forEach((class_name) => {
            element.classList.remove(class_name);
          });
        }
        if (current_form.hasAttribute("active")) {
          current_form.removeAttribute("active");
          inactive_form_classes.forEach((class_name) => {
            current_form.classList.add(class_name);
          });
          active_form_classes.forEach((class_name) => {
            current_form.classList.remove(class_name);
          });
        } else if (current_form_name == form_name) {
          current_form.setAttribute("active", "");
          active_form_classes.forEach((class_name) => {
            current_form.classList.add(class_name);
          });
          inactive_form_classes.forEach((class_name) => {
            current_form.classList.remove(class_name);
          });
          multisteps_form.style.height = current_form.scrollHeight + "px";
          done = true;
        }
      }
    }
  });
});
