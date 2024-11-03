const Checkout = (function ($) {
  const _formId = "#form-checkout-transacao";

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

    $(".modify-select", _formId).select2();

    document
      .querySelector(`${_formId} #uf`)
      .addEventListener("change", function () {
        ServiceCep.changeCidades(this.value, _formId);
      });

    document
      .querySelector(`${_formId} #cep`)
      .addEventListener("keyup", function () {
        ServiceCep.get(this.value, _formId);
      });
  }

  function __addCupom() {
    const cupom = document.querySelector("#get-checkout-cupom").value;
    if (cupom.length < 3) {
      Notify.alert(`Preencha o campo cupom! `);
      return false;
    }

    window
      .axios({
        method: "post",
        url: "/checkout-cupom",
        data: {
          cupom: cupom,
        },
      })
      .then(function (resp) {
        if (resp.data.error == 0) {
          Notify.success(resp.data.message);
          document.querySelector("#get-checkout-cupom").value = "";
          document.location.reload();
          return;
        }
        Notify.alert(resp.data.message);
      })
      .catch(function (error) {
        console.log(error);
        if (error.response) {
          Notify.error(error.response.data.message);
          return;
        }
        Notify.error(error.message);
      });
  }

  function __valid() {
    const name = document.querySelector(_formId + " #nome").value;
    if (name.length < 3) {
      Notify.alert(`Preencha o campo nome! `);
      $(_formId + " #nome").focus();
      return false;
    }

    const email = qs(_formId + " #email").value;
    if (email.length < 3) {
      Notify.alert(`Preencha o campo e-mail! `);
      $(_formId + " #email").focus();
      return false;
    }

    const cpf = qs(_formId + " #cpf").value;
    if (cpf.length < 11) {
      Notify.alert(`Preencha o campo CPF! `);
      $(_formId + " #cpf").focus();
      return false;
    }

    const telefone = qs(_formId + " #telefone").value;
    if (telefone == "") {
      Notify.alert(`Preencha o campo telefone! `);
      $(_formId + " #telefone").focus();
      return false;
    }

    const dataNascimento = qs(_formId + " #data_nascimento").value;
    if (dataNascimento == "") {
      Notify.alert(`Preencha o campo data de nascimento! `);
      $(_formId + " #data_nascimento").focus();
      return false;
    }

    const cep = qs(_formId + " #cep").value;
    if (cep == "") {
      Notify.alert(`Preencha o campo cep! `);
      $(_formId + " #cep").focus();
      return false;
    }

    const bairro = qs(_formId + " #bairro").value;
    if (cep == "") {
      Notify.alert(`Preencha o campo bairro! `);
      $(_formId + " #bairro").focus();
      return false;
    }

    const logradouro = qs(_formId + " #logradouro").value;
    if (cep == "") {
      Notify.alert(`Preencha o campo logradouro! `);
      $(_formId + " #logradouro").focus();
      return false;
    }

    return true;
  }

  function __save() {
    let data = $(_formId).serializeJSON();

    $.loadmask();
    setTimeout(function () {
      $.unloadmask();
    }, 4000);

    window
      .axios({
        method: "POST",
        url: "/checkout-transaction",
        data: {
          data: JSON.stringify(data),
        },
        dataType: "json",
        timeout: 120000,
      })
      .then(function (resp) {
        $.unloadmask();
        if (resp.data.error == 0) {
          Notify.success(
            "Você será redirecionado para o pagamento dentro do ambiente do PagSeguro!"
          );
          setTimeout(function () {
            document.location.href = resp.data.data.link_pagamento;
          }, 1500);
          // document.querySelector(_formId).reset();
        }
      })
      .catch(function (error) {
        if (error.response) {
          Notify.error(error.response.data.message);
        } else {
          Notify.error(error.message);
        }
      });
  }

  return {
    init: __init,
    addCupom: __addCupom,
  };
})(jQuery);
