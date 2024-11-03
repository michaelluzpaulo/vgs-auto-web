const ARAulaAvaliacao = (function () {
  const _formId = "#areaRestritaAulaAvaliacaoForm";

  function __init() {
    __actions();
  }

  function __actions() {
    $(_formId).on("submit", function (e) {
      e.preventDefault();
      if (Number($("#nota", _formId).val()) == 0) {
        Notify.error("Selecione uma nota! ");
        return false;
      }

      if ($("#texto", _formId).val() == "") {
        Notify.error("Digite um comentário! ");
        return false;
      }
      __save();
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
        nota: {
          required: true,
        },
        texto: {
          required: true,
        },
      },
      messages: {
        nota: { required: "Campo obrigatório" },
        texto: { required: "Campo obrigatório" },
      },
    });
  }

  /**
   * Salva o registro no banco de dados
   */
  function __save() {
    const aulaId = parseInt($("#avaliacao-aula_id", _formId).val());
    let data = $(_formId).serializeJSON();
    const method = "POST";
    const url = `/area-restrita-aluno/aula/${aulaId}/avaliacao`;

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
          // console.log(json.data);
          setTimeout(function () {
            document.location = `/area-restrita-aluno/curso/${json.data.cursoId}`;
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
