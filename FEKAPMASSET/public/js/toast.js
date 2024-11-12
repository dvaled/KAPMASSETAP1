var triggers = document.querySelectorAll("[toast]");
triggers.forEach((trigger) => {
  let toastId = trigger.getAttribute("data-target");
  trigger.addEventListener("click", function () {
    let toast = document.querySelector("#" + toastId);
    if (trigger.getAttribute("aria-hidden") == "true") {
      trigger.setAttribute("aria-hidden", "false");
      toast.classList.remove("hidden");
      setTimeout(function () {
        toast.classList.remove("opacity-0");
      }, 100);
      setTimeout(function () {
        trigger.setAttribute("aria-hidden", "true");
        toast.classList.add("opacity-0");
        setTimeout(function () {
          toast.classList.add("hidden");
        }, 200);
      }, 3800);
    }
  });
});
