var labels = document.querySelectorAll("label[checkbox-color-label]");

labels.forEach(label => {
    label.addEventListener("click", function () {
        let shapes = label.querySelectorAll("[checkbox-color]");
        shapes.forEach(shape => {
            shape.classList.toggle("fill-slate-800");
            shape.classList.toggle("fill-white");
        });
    })
});