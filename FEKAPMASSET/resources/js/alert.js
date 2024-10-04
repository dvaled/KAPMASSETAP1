if (document.querySelector("[alert-close]")) {
  var buttons = document.querySelectorAll("[alert-close]");
  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      let alert = this.closest("div[alert]");
      console.log(alert);
      alert.remove();
    });
  });
}
