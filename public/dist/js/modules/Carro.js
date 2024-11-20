const Carro = (function () {
  const _formIdPrincipal = "#form-carro-principal";
  const _formId = "#carroForm";
  const _tableId = "#carroTable";
  const _tableTdClass = "carroTableTd";
  const _modalId = "#carroModal";
  let _initCache = false;

  function __init() {
    __createTable();
    __actions();
  }

  function __actions() {
    $(_formIdPrincipal).on("submit", function (e) {
      e.preventDefault();
      __refreshTable();
    });

    $(".run-add-cadastro").on("click", function (e) {
      __add();
    });

    if (!_initCache) {
      $(document).on("click", "." + _tableTdClass, function (e) {
        var id = $(this).attr("data-id");
        __update(id);
      });
      _initCache = true;
    }
  }

  function __actionsModal() {
    $(".modify-select", _modalId).select2();
    $(".run-btn-delete", _modalId).on("click", function () {
      __delete();
    });
    $(_formId).on("submit", function (e) {
      if ($(_formId).valid()) {
        e.preventDefault();
        __save();
      }
    });

    var myModal = new bootstrap.Modal(qs(_modalId), {
      keyboard: false,
    });
    myModal.show();

    qs(_modalId).addEventListener("shown.bs.modal", function () {
      qs(`${_modalId} #titulo`).focus();
    });
    qs(_modalId).addEventListener("hidden.bs.modal", function () {
      $(_modalId).remove();
    });
    Utils.setMask(_formId);

    CKEDITOR.disableAutoInline = true;
    $(document).ready(function () {
      $(".ckeditor").ckeditor();
    });

    CarroGaleria.init();
  }

  /**
   * Recarrega os dados da tabela
   */
  function __refreshTable() {
    var oTable = $(_tableId).DataTable();
    oTable.draw();
  }

  function __createTable() {
    $(_tableId).dataTable({
      bFilter: false,
      pageLength: 50,
      order: [0, "DESC"],
      //"sDom": '<"top"i>rt<"bottom"flp><"clear">',
      lengthMenu: [
        [50, 100, 150, -1],
        [50, 100, 150, "Todos"],
      ],
      lengthChange: true,
      pagingType: "full_numbers",
      processing: false,
      serverSide: true,
      bAutoWidth: false,
      ajax: {
        url: "/admin/carros/data",
        type: "GET",
        dataSrc: function (json) {
          //console.log(json);
          $.unloadmask();
          if (json.success) {
            return json.data;
          } else {
            console.log(json.message);
            // Notify.error(json.message);
          }
        },
      },
      fnServerParams: function (aoData) {
        $.loadmask();
        aoData["search[id]"] = $("#filtro_id").val();
        aoData["search[nome]"] = $("#filtro_nome").val();
        aoData["search[active]"] = $("#filtro_active").val();
        aoData["search[status]"] = $("#filtro_status").val();
      },
      columnDefs: [
        {
          targets: [-2, -3],
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).css({ textAlign: "center" });
          },
        },
        {
          targets: [3],
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).css({ textAlign: "end" });
          },
        },
        {
          targets: -1,
          data: null,
          sortable: false,
          createdCell: function (td, cellData, rowData, row, col) {
            $(td)
              .css({
                textAlign: "center",
                padding: 0,
              })
              .html(
                '<button type="button" data-id="' +
                  rowData["DT_RowId"] +
                  '" class="btn btn-secondary ' +
                  _tableTdClass +
                  '"><i class="fa fa-edit"></i></button>'
              );
          },
        },
      ],
    });
  }

  function __valid() {
    $(_formId).validate({
      errorPlacement: function (error, element) {
        $(element)
          .closest("form")
          .find("label[for='" + element.attr("id") + "']")
          .append(error);
      },
      errorElement: "span",
      rules: {
        name: {
          required: true,
        },
      },
      messages: {
        name: { required: "Campo obrigatório" },
      },
    });
  }

  function __add() {
    $.loadmask();
    ModalFactory.create("carroModal", "xl");

    $(".modal-content", _modalId).load(
      "/admin/carros/create",
      function (responseText, textStatus, jqXHR) {
        if (textStatus === "success") {
          if (Validator.IsJsonString(responseText)) {
            var json = JSON.parse(responseText);
            Notify.setResponse(json);
          } else {
            __actionsModal();
            // __valid();
          }
          $.unloadmask();
        } else {
          ServiceHttp.exceptionLoad(responseText, textStatus, jqXHR);
        }
      }
    );
  }

  /**
   * Abre a janela para alteração de cadastro
   * @param id
   */
  function __update(id) {
    $.loadmask();
    ModalFactory.create("carroModal", "xl");

    $(".modal-content", _modalId).load(
      "/admin/carros/" + id + "/edit",
      function (responseText, textStatus, jqXHR) {
        if (textStatus === "success") {
          if (Validator.IsJsonString(responseText)) {
            var json = JSON.parse(responseText);
            Notify.setResponse(json);
          } else {
            __actionsModal();
            // __valid();
          }
          $.unloadmask();
        } else {
          ServiceHttp.exceptionLoad(responseText, textStatus, jqXHR);
        }
      }
    );
  }

  /**
   * Salva o registro no banco de dados
   */
  function __save() {
    const id = parseInt($("#id", _formId).val());
    let data = $(_formId).serializeJSON();
    const method = id ? "PUT" : "POST";
    const url = id ? "/admin/carros/" + id : "/admin/carros";

    $.loadmask();
    $.ajax({
      type: method,
      url: url,
      data: {
        data: JSON.stringify(data),
      },
      dataType: "json",
      timeout: 120000,
      success: function (json) {
        if (json.error == 0) {
          let step = 0;
          let message = json.message;
          __refreshTable();

          let formData = new FormData();
          let file = document.querySelector("#img", _formId);

          if (file.value != "") {
            step++;
            const file2 = file.files[0];
            formData.append("img", file2);

            $.ajax({
              url: "/admin/carros/" + json.data.id + "/foto",
              type: "POST",
              data: formData,
              dataType: "json",
              processData: false,
              contentType: false,
              success: function (resp) {
                message += resp.message;
                step--;
              },
              error: function (jqXHR, textStatus, errorThrown) {
                ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
              },
            });
          }

          if (qs("#img_input")) {
            let file = qs("#img_input");
            if (file.files != "") {
              let formData = new FormData();

              if (file.value != "") {
                if (file.value != "") {
                  for (var i in file.files) {
                    formData.append("file[" + i + "]", file.files[i]);
                  }
                }
                step++;
                $.ajax({
                  url: `/admin/carros/${json.data.id}/galeria-foto`,
                  type: "POST",
                  data: formData,
                  dataType: "json",
                  processData: false,
                  contentType: false,
                  success: function (resp) {
                    step--;
                    message += resp.message;
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                    ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
                  },
                });
              }
            }
          }

          let tentativa = 0;
          let interval = setInterval(function () {
            if (tentativa > 10 || step == 0) {
              clearInterval(interval);
              $.unloadmask();
              Notify.success(message);
              $(_modalId).hide();
              $(_modalId).modal("hide");
            }
            tentativa++;
          }, 2000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
      },
    });
  }

  /**
   * Remove o registro do banco de dados
   * @param id
   */
  function __delete() {
    Notify.confirm(
      "Você confirma a exclusão do registro?<br />Após a confirmação será impossível reverter o comando.",
      function () {
        $.ajax({
          type: "DELETE",
          url: "/admin/carros/" + $("#id", _formId).val(),
          dataType: "json",
          timeout: 120000,
          success: function (json) {
            $("#confirmModal").modal("hide");
            $(_modalId).modal("hide");
            Notify.success(json.message);
            __refreshTable();
          },
          error: function (jqXHR, textStatus, errorThrown) {
            ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
          },
        });
      }
    );
  }

  function __deleteFoto(id) {
    Notify.confirm(
      "Você confirma a exclusão do registro?<br />Após a confirmação será impossível reverter o comando.",
      function () {
        $.ajax({
          type: "DELETE",
          url: "/admin/carros/" + id + "/foto",
          dataType: "json",
          timeout: 120000,
          success: function (json) {
            $("#confirmModal").modal("hide");
            $(_modalId).modal("hide");
            Notify.success(json.message);
            __refreshTable();
          },
          error: function (jqXHR, textStatus, errorThrown) {
            ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
          },
        });
      }
    );
  }

  return {
    init: __init,
    update: __update,
    deleteFoto: __deleteFoto,
  };
})();
