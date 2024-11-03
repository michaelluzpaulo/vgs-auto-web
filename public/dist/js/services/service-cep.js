const ServiceCep = (function () {
  /**
   *
   * @param cep
   * @param elementPai
   */
  function __get(cep, elementPai) {
    const bufferCep = cep.replace(/\D/g, "");

    if (bufferCep.length == 8) {
      const url = `https://viacep.com.br/ws/${bufferCep}/json`;
      const options = {
        method: "GET",
        mode: "cors",
        headers: {
          "content-type": "application/json;charset=utf-8",
        },
      };

      fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
          $(elementPai + " #logradouro").val(data.logradouro);
          $(elementPai + " #bairro").val(data.bairro);
          $(elementPai + " #uf").val(data.uf);

          __changeCidades(data.uf, elementPai, data.localidade);

          // $(elementPai + " #tipo_logradouro_id").val(
          //   data.tipo_logradouro_id
          // );
          // $("#tipo_logradouro_id", elementPai).select2();
        })
        .catch((error) => {
          $.unloadmask();
          Notify.error(error.message);
        });
    }
  }

  /**
   *
   * @param estado_id
   * @param elementPai
   * @param cidade
   * @private
   */
  function __changeCidades(uf, elementPai, localidade = "") {
    if (uf) {
      $("#cidade_id", elementPai).html(
        '<option value="0">SELECIONE...</option>'
      );

      $.loadmask();
      const url = `/admin/enderecos/${uf}/cidades`;
      const options = {
        method: "GET",
        mode: "cors",
        headers: {
          "content-type": "application/json;charset=utf-8",
        },
      };

      fetch(url, options)
        .then((response) => response.json())
        .then((data) => {
          $.unloadmask();
          if (data.error == 0) {
            $.each(data.cidades, function (i, item) {
              $("#cidade_id", elementPai).append(
                `<option value="${item.id}"  ${
                  localidade != "" && item.nome.includes(localidade)
                    ? "selected"
                    : ""
                }>${item.nome}</option>`
              );
            });
          } else {
            Notify.error(data);
          }
        })
        .catch((error) => {
          $.unloadmask();
          Notify.error(error.message);
        });
    }
  }

  return {
    get: __get,
    setCidade: __changeCidades,
    changeCidades: __changeCidades,
  };
})();
