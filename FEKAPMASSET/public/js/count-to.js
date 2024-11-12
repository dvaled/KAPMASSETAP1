let numbers = document.querySelectorAll("[countTo]");

numbers.forEach(number => {
  let ID = number.getAttribute("id");
  let value = number.getAttribute("countTo");
  const countUp = new CountUp(ID, value);

  if (!countUp.error) {
    countUp.start();
  } else {
    console.error(countUp.error);
    number.innerHTML = value;
  }
});
