const ARTirarDuvida = (function () {
  const _formId = "#areaRestritaTirarDuvidaForm";
  const _modalName = "areaRestritaTirarDuvidaFormModal";

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
    $(".run-curso_aula_duvida-submit").on("click", function (e) {
      e.preventDefault();
      const cursoAulaDuvidaId = $(this).attr("data-curso_aula_duvida_id");
      if (qs("#curso_aula_duvida_texto_" + cursoAulaDuvidaId).value == "") {
        Notify.error("Você não pode enviar uma nova duvida vazia! ");
        return;
      }

      __saveNovaDuvida(
        cursoAulaDuvidaId,
        qs("#curso_aula_duvida_texto_" + cursoAulaDuvidaId).value
      );
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
        assunto: {
          required: true,
        },
        texto: {
          required: true,
        },
      },
      messages: {
        assunto: { required: "Campo obrigatório" },
        texto: { required: "Campo obrigatório" },
      },
    });
  }

  function __saveNovaDuvida(id, texto) {
    $.loadmask();
    $.ajax({
      type: "POST",
      url: `/area-restrita-aluno/tira-duvida-mensagem/${id}`,
      data: {
        data: JSON.stringify({ texto: texto }),
      },
      dataType: "json",
      timeout: 120000,
      success: function (json) {
        $.unloadmask();
        if (json.error == 0) {
          Notify.success(json.message);
          setTimeout(function () {
            document.location.reload();
          }, 2000);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
      },
    });
  }

  /**
   * Salva o registro no banco de dados
   */
  function __save() {
    const aulaId = parseInt($("#aula_id", _formId).val());
    let data = $(_formId).serializeJSON();
    const method = "POST";
    const url = `/area-restrita-aluno/aula/${aulaId}/tiraduvida`;

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
          Notify.success(json.message);
          setTimeout(function () {
            document.location.reload();
          }, 2000);
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
