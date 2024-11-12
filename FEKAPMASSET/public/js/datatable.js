if (document.getElementById("datatable-basic")) {
  const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
    searchable: false,
    fixedHeight: true
  });
}

if (document.getElementById("datatable-search")) {
  const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
    searchable: true,
    fixedHeight: true
  });
}

if (document.getElementById('products-list')) {
  const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
    searchable: true,
    fixedHeight: false,
    perPage: 7
  });

  document.querySelectorAll("[export-button-products]").forEach(function(el) {
    el.addEventListener("click", function(e) {
      var type = el.dataset.type;

      var data = {
        type: type,
        filename: "soft-ui-" + type,
      };

      if (type === "csv") {
        data.columnDelimiter = "|";
      }

      dataTableSearch.export(data);
    });
  });
};

if (document.getElementById("datatable-search-list")) {
  const dataTableSearch = new simpleDatatables.DataTable("#datatable-search-list", {
    searchable: true,
    fixedHeight: false,
    perPageSelect: false
  });
  
  document.querySelectorAll("[export-button-list]").forEach(function(el) {
    el.addEventListener("click", function(e) {
      var type = el.dataset.type;
  
      var data = {
        type: type,
        filename: "soft-ui-" + type,
      };
  
      if (type === "csv") {
        data.columnDelimiter = "|";
      }
  
      dataTableSearch.export(data);
    });  
});
}


document.querySelector(".dataTable-input").classList.add("focus:shadow-soft-primary-outline", "dark:text-white/80", "ease-soft", "focus:outline-none", "focus:transition-shadow");


