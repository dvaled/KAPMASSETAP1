// regular slider

var slider = document.getElementById("sliderRegular");
if (slider) {
  noUiSlider.create(slider, {
    start: 40,
    connect: [true, false],
    range: {
      min: 0,
      max: 100,
    },
  });
}

// Rounded slider

if (document.querySelector("round-slider")) {
  const setValue = function (value, active) {
    document.querySelectorAll("round-slider").forEach(function (el) {
      if (el.value === undefined) return;
      el.value = value;
    });
    const span = document.querySelector("#value");
    span.innerHTML = value;
    if (active) span.style.color = "red";
    else span.style.color = "black";
  };

  document.querySelectorAll("round-slider").forEach(function (el) {
    el.addEventListener("value-changed", function (ev) {
      if (ev.detail.value !== undefined) setValue(ev.detail.value, false);
      else if (ev.detail.low !== undefined) setLow(ev.detail.low, false);
      else if (ev.detail.high !== undefined) setHigh(ev.detail.high, false);
    });

    el.addEventListener("value-changing", function (ev) {
      if (ev.detail.value !== undefined) setValue(ev.detail.value, true);
      else if (ev.detail.low !== undefined) setLow(ev.detail.low, true);
      else if (ev.detail.high !== undefined) setHigh(ev.detail.high, true);
    });
  });
}
