const Banner = (function () {
  const _formIdPrincipal = "#form-banner-principal";
  const _formId = "#bannerForm";
  const _tableId = "#bannerTable";
  const _tableTdClass = "bannerTableTd";
  const _modalId = "#bannerModal";
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
    // $(".modify-select", _modalId).select2();
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

    // CKEDITOR.disableAutoInline = true;
    // $(document).ready(function () {
    //   $(".ckeditor").ckeditor();
    // });
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
        url: "/admin/banners/data",
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
        aoData["search[ativo]"] = $("#filtro_ativo").val();
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
    ModalFactory.create("bannerModal", "lg");

    $(".modal-content", _modalId).load(
      "/admin/banners/create",
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
    ModalFactory.create("bannerModal", "lg");

    $(".modal-content", _modalId).load(
      "/admin/banners/" + id + "/edit",
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

  function __save() {
    var id = parseInt($("#id", _formId).val());
    var data = $(_formId).serializeJSON();
    var method = id ? "PUT" : "POST";
    var url = id ? "/admin/banners/" + id : "/admin/banners";

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
            file = file.files[0];
            formData.append("img", file);
            formData.append("tipo", 1);

            $.ajax({
              url: "/admin/banners/" + json.data.id + "/foto",
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

          formData = new FormData();
          file = document.querySelector("#img_mob", _formId);

          if (file.value != "") {
            step++;
            file = file.files[0];
            formData.append("img_mob", file);
            formData.append("tipo", 2);

            $.ajax({
              url: "/admin/banners/" + json.data.id + "/foto",
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

          let tentativa = 0;
          const interval = setInterval(function () {
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
          url: "/admin/banners/" + $("#id", _formId).val(),
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
          url: "/admin/banners/" + id + "/foto",
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
    deleteFoto: __deleteFoto,
  };
})();
