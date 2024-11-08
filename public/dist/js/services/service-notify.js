var Notify = {
  make: function (template, message, modalId, callback) {
    $(".wrapper").before(template);
    $(`#${modalId} .modal-body`).html(message);
    // $('#alertModal').modal('show');

    const myModal = new bootstrap.Modal(document.getElementById(modalId), {
      // backdrop: true,
      backdrop: "static",
      keyboard: false,
    });
    myModal.show();

    document
      .getElementById(modalId)
      .addEventListener("hidden.bs.modal", function (event) {
        $(`#${modalId}`).remove();
        // if ($('.modal').length) {
        //     // $('body').addClass('modal-open');
        //     myModal.dispose();
        // }
        if (typeof callback != "undefined") {
          callback();
        }
      });
  },

  header: function (title, type = "warning", modalId) {
    let typeIcon = "";
    let svgIcon = "";
    if (type == "warning") {
      typeIcon = "warning";
      svgIcon = `<svg class="bi flex-shrink-0 me-2" fill="#fff" width="18" height="18"><use xlink:href="#exclamation-triangle-fill"/></svg>`;
    }
    if (type == "success") {
      typeIcon = "success";
      svgIcon = `<svg class="bi flex-shrink-0 me-2" fill="#fff" width="18" height="18"><use xlink:href="#check-circle-fill""/></svg>`;
    }
    if (type == "danger") {
      typeIcon = "danger";
      svgIcon = `<svg class="bi flex-shrink-0 me-2" fill="#fff" width="18" height="18"><use xlink:href="#exclamation-triangle-fill"/></svg>`;
    }
    if (type == "info") {
      typeIcon = "primary";
      svgIcon = `<svg class="bi flex-shrink-0 me-2" fill="#fff" width="18" height="18"><use xlink:href="#info-fill"/></svg>`;
    }

    return `
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </symbol>
          <symbol id="info-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </symbol>
          <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </symbol>
        </svg>
        <div class="modal-header alert alert-modify bg-${typeIcon}">
            <h5 class="modal-title" id="${modalId}Label"  style="color: #fff;font-weight: bold;">
            ${svgIcon} ${title}</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      `;
  },

  alert: function (message, callback) {
    const template = `
      <div class="modal modal-warning fade" id="alertModal" tabindex="-1" style="z-index: 3000">
          <div class="modal-dialog">
              <div class="modal-content">
                ${Notify.header("Atenção", "warning", "alertModal")}
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">OK</button>
                </div>
              </div>
          </div>
      </div>`;

    Notify.make(template, message, "alertModal", callback);
  },

  error: function (message, callback) {
    const template = `
      <div class="modal modal-danger fade" id="errorModal" tabindex="-1" style="z-index: 3000">
          <div class="modal-dialog">
              <div class="modal-content">
                ${Notify.header("Alerta de falha", "danger", "errorModal")}
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">OK</button>
                </div>
              </div>
          </div>
      </div>`;

    Notify.make(template, message, "errorModal", callback);
  },

  success: function (message, callback) {
    const template = `
      <div class="modal modal-success fade" id="successModal" tabindex="-1" style="z-index: 3000">
          <div class="modal-dialog">
              <div class="modal-content">
                ${Notify.header("Sucesso", "success", "successModal")}
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">OK</button>
                </div>
              </div>
          </div>
      </div>`;

    Notify.make(template, message, "successModal", callback);
  },

  confirm: function (message, callbackBtnOk, callback) {
    const template = `
      <div class="modal fade" id="confirmModal" tabindex="-1" style="z-index: 3000">
          <div class="modal-dialog">
              <div class="modal-content">
                ${Notify.header("Confirmação", "warning", "confirmModal")}
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btn-cancel"  data-bs-dismiss="modal"> Cancelar</button>
                    <button type="button" class="btn btn-success  btn-lg" id="btn-confirm"> OK</button>
                </div>
              </div>
          </div>
      </div>`;

    Notify.make(template, message, "confirmModal", callback);

    $("#btn-confirm").bind("click", callbackBtnOk);
  },
  timeout: function () {
    $(".wrapper").before(
      `<div class="modal fade" id="timeoutModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><h5 class="modal-title" id="timeoutModalLabel"><i class="glyphicon glyphicon-question-sign"></i> Atenção</h5></div><div class="modal-body">Sua sssão expirou!<br />Faça o login novamente.</div><div class="modal-footer"><button type="button" class="btn btn-danger  btn-lg" id="btn-ok" data-bs-dismiss="modal"> OK</button></div></div></div></div>`
    );
    $("#timeoutModal").modal({ backdrop: "static", keyboard: false });
    $("#timeoutModal").on("hidden.bs.modal", function () {
      document.location = "../sistema/logout";
    });
  },

  setResponse: function (json) {
    if (json.error) {
      Msg.error(json.message);
    } else if (json.warning) {
      Msg.alert(json.message);
    } else if (json.timeout) {
      Msg.timeout();
    } else {
      Msg.error(json);
    }
  },
};
