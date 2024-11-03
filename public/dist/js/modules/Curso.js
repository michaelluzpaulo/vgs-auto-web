const Curso = (function () {
  const _formIdPrincipal = "#form-curso-principal";
  const _formId = "#cursoForm";
  const _tableId = "#cursoTable";
  const _tableTdClass = "cursoTableTd";
  const _modalId = "#cursoModal";
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
      qs(`${_modalId} #nome`).focus();
    });
    qs(_modalId).addEventListener("hidden.bs.modal", function () {
      $(_modalId).remove();
    });
    Utils.setMask(_formId);

    CKEDITOR.disableAutoInline = true;
    $(document).ready(function () {
      $(".ckeditor").ckeditor();
    });

    CursoGaleria.init();
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
        url: "/admin/cursos/data",
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
        aoData["search[tipo]"] = $("#filtro_tipo_id").val();
      },
      columnDefs: [
        {
          targets: [-2, -3],
          createdCell: function (td, cellData, rowData, row, col) {
            $(td).css({ textAlign: "center" });
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
    ModalFactory.create("cursoModal", "xl");

    $(".modal-content", _modalId).load(
      "/admin/cursos/create",
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
    ModalFactory.create("cursoModal", "xl");

    $(".modal-content", _modalId).load(
      "/admin/cursos/" + id + "/edit",
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
    var id = parseInt($("#id", _formId).val());
    var data = $(_formId).serializeJSON();
    var method = id ? "PUT" : "POST";
    var url = id ? "/admin/cursos/" + id : "/admin/cursos";

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
        let loop = 0;
        $.unloadmask();
        if (json.error == 0) {
          var step = 0;
          var message = json.message;
          __refreshTable();

          var formData = new FormData();
          var file = document.querySelector("#img", _formId);

          if (file.value != "") {
            step++;
            var file = file.files[0];
            formData.append("img", file);

            $.ajax({
              url: "/admin/cursos/" + json.data.id + "/foto",
              type: "POST",
              data: formData,
              dataType: "json",
              processData: false,
              contentType: false,
              success: function (retorno) {
                message += retorno.message;
                step--;
              },
              error: function (jqXHR, textStatus, errorThrown) {
                ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
              },
            });
          }
          var tentativa = 0;
          var interval = setInterval(function () {
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
        if (json.error == 0) {
          message += json.message;
          __refreshTable();

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
                loop++;
                $.ajax({
                  url: `/admin/cursos/${json.data.id}/galeria-foto`,
                  type: "POST",
                  data: formData,
                  dataType: "json",
                  processData: false,
                  contentType: false,
                  success: function (retorno) {
                    loop--;
                    message += retorno.message;
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                    ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
                  },
                });
              }
            }
          }
          let fuga = 0;
          let interval = setInterval(() => {
            fuga++;
            if (loop <= 0 || fuga > 10) {
              Notify.success(message);
              $(_modalId).hide();
              $(_modalId).modal("hide");
              $.unloadmask();
              clearInterval(interval);
              setTimeout(() => {
                __update(json.data.id);
              }, 1500);
            }
          }, 2500);
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
          url: "/admin/cursos/" + $("#id", _formId).val(),
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
          url: "/admin/cursos/" + id + "/foto",
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
