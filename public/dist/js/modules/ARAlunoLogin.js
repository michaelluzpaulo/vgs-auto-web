const ARAlunoLogin = (function () {
  const _formId = "#form-area-restrita-aluno-login";

  function __init() {
    __actions();
  }

  function __actions() {
    $(_formId).on("submit", function (e) {
      e.preventDefault();
      if ($(_formId).valid()) {
        __acessarLogin();
      }
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
        email: {
          required: true,
        },
        password: {
          required: true,
        },
      },
      messages: {
        email: { required: "Campo obrigatório" },
        password: { required: "Campo obrigatório" },
      },
    });
  }

  function __acessarLogin() {
    var data = $(_formId).serializeJSON();
    var method = "POST";
    var url = "/area-restrita-aluno/login";

    $.loadmask();
    window
      .axios({
        method: method,
        url: url,
        data: {
          data: JSON.stringify(data),
        },
      })
      .then(function (json) {
        $.unloadmask();
        if (json.data.error == 0) {
          Notify.success(json.data.message);
          setTimeout(function () {
            document.location = "/area-restrita-aluno";
          }, 2000);
        }
      })
      .catch(function (error) {
        $.unloadmask();
        if (error.response) {
          Notify.error(error.response.data.message);
        } else {
          console.log(error);
          Notify.error(error.message);
        }
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
          url: "/admin/alunos/" + $("#id", _formId).val(),
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
  };
})();
