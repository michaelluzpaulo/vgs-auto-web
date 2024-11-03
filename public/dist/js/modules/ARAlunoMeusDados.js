const ARAlunoMeusDados = (function () {
  const _formId = "#areaRestritaAlunoForm";
  const _modalName = "areaRestritaAlunoFormModal";

  function __init() {
    __actions();
  }

  function __actions() {
    $(_formId).on("submit", function (e) {
      if ($(_formId).valid()) {
        e.preventDefault();
        __save();
      }
    });

    Utils.setMask(_formId);
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
        nome: {
          required: true,
        },
        password: {
          required: true,
          minlength: 8,
          maxlength: 12,
        },
      },
      messages: {
        nome: { required: "Campo obrigatório" },
        password: {
          required: "Digite uma senha",
          minlength: "A senha precisa ter entre 8 e 12 caracteres",
          maxlength: "A senha precisa ter entre 8 e 12 caracteres",
        },
      },
    });
  }

  /**
   * Salva o registro no banco de dados
   */
  function __save() {
    var id = parseInt($("#id", _formId).val());
    var data = $(_formId).serializeJSON();
    var method = id ? "PUT" : "POST";
    var url = id
      ? "/area-restrita-aluno/meus-dados/" + id
      : "/area-restrita-aluno/meus-dados";

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
        $.unloadmask();
        if (json.error == 0) {
          __valid();
          Notify.success(json.message);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
      },
    });
  }

  return {
    init: __init,
  };
})();
