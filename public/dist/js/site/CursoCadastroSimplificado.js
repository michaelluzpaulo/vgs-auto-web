var CursoCadastroSimplificado = (function ($) {
  var _formId = "#form-curso-simplificado";

  function __init() {
    __actions();
  }

  function __actions() {
    Utils.setMask(_formId);
    $(_formId).on("submit", function (e) {
      e.preventDefault();
      if (!__valid()) {
        return false;
      }
      __save();
    });
  }

  function __valid() {
    var name = document.querySelector(_formId + " #nome").value;
    if (name.length < 3) {
      Notify.alert(`Preencha o campo nome! `);
      $(_formId + " #nome").focus();
      return false;
    }

    var email = qs(_formId + " #email").value;
    if (email.length < 3) {
      Notify.alert(`Preencha o campo e-mail! `);
      $(_formId + " #email").focus();
      return false;
    }

    var cpf = qs(_formId + " #cpf").value;
    if (cpf.length < 11) {
      Notify.alert(`Preencha o campo CPF! `);
      $(_formId + " #cpf").focus();
      return false;
    }

    return true;
  }

  /**
   * Salva o registro no banco de dados
   */
  function __save() {
    var data = $(_formId).serializeJSON();

    $.loadmask();
    setTimeout(function () {
      $.unloadmask();
    }, 4000);
    $.ajax({
      type: "POST",
      url: "/curso-cadastro-simplificado",
      data: {
        data: JSON.stringify(data),
      },
      dataType: "json",
      timeout: 120000,
      success: function (json) {
        $.unloadmask();
        if (json.error == 0) {
          Notify.success(json.message);
          //reset
          document.querySelector(_formId).reset();
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
})(jQuery);
