let $table;

function init() {
  $("#md_form_product").on("submit", function (e) {
    addNewProduct(e);
  });
}

$(document).ready(function () {
  $("#category_id").select2({
    dropdownParent: $("#mod_mantenimiento"),
  });

  $.post("../../controller/category.php?op=cmbCategory", function (data) {
    $("#category_id").html(data);
  });

  $table = $("#product_data")
    .dataTable({
      aProcessing: true, //Activamos el procesamiento del datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "Bfrtip", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../../controller/product.php?op=listAll",
        method: "GET",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 10, //Por cada 10 registros hace una paginación
      order: [[0, "asc"]], //Ordenar (columna,orden)
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending: ": Activar para ordenar la columna de manera ascendente",
          sSortDescending: ": Activar para ordenar la columna de manera descendente",
        },
      },
    })
    .DataTable();
});

function addNewProduct(e) {
  e.preventDefault();

  //Capture only names from the form of HTML (modalmantenimiento)
  let formData = new FormData($("#md_form_product")[0]);

  $.ajax({
    url: "../../controller/product.php?op=addProduct",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function () {
      $("#md_form_product")[0].reset();
      $("#mod_mantenimiento").modal("hide");
      $("#product_data").DataTable().ajax.reload();

      Swal.fire("¡REGISTRO DE PRODUCTO!", "Se registro correctamente", "success");
    },
  });
}

function updateProduct(product_id) {
  $("#mod_title").html("Editar Registro");

  $.post("../../controller/product.php?op=showProductToEdit", { product_id: product_id }, function (data) {
    data = JSON.parse(data);
    $("#product_id").val(data.product_id);
    $("#product_name").val(data.product_name);
    $("#category_id").val(data.category_id).trigger("change");
    $("#product_description").val(data.product_description);
    $("#product_stock").val(data.product_stock);
  });

  $("#mod_mantenimiento").modal("show");
}

function deleteProduct(product_id) {
  Swal.fire({
    title: "Eliminar producto",
    text: "¿Estás seguro de eliminar el producto seleccionado?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Eliminar",
    cancelButtonText: "Cancelar",
    confirmButtonColor: "#198754",
    cancelButtonColor: "#dc3545",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../../controller/product.php?op=delete", { product_id }, function () {
        $("#product_data").DataTable().ajax.reload();
        Swal.fire("¡Producto eliminado!", "Tu producto ha sido eliminado satisfactoriamente", "success");
      });
    }
  });
}

$(document).on("click", "#btn_addEditProduct", function () {
  $("#mod_title").html("Nuevo Registro");
  $("#mod_mantenimiento").modal("show");
  $("#md_form_product")[0].reset();
  $("#product_id").val("");
  $("#category_id").val("").trigger("change");
});

init();
