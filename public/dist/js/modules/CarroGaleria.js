var CarroGaleria = (function () {
  var _formId = "#carroForm";
  var _modalId = "#carroModal";

  function __init() {
    __actions();
  }

  function __actions() {
    $(".run-remove-foto", _modalId).on("click", function () {
      const fotoId = $(this).attr("data-foto-id");
      __deleteGalleryFoto(fotoId);
    });

    $(".run-btn-delete-carro-foto-all-selected", _modalId).on(
      "click",
      function (e) {
        e.preventDefault();
        const fotos = [];
        $(".carro-multifotos-img:checked", _modalId).each(function () {
          fotos.push($(this).val());
        });
        __deleteGalleryFotoAllChecked(fotos);
      }
    );

    if (document.querySelector(".img_input")) {
      document.querySelector(".img_input").addEventListener("change", () => {
        _imagesArrayUpload = [];
        const input = document.querySelector(".img_input");
        const files = input.files;

        // if (files.length > 5) {
        //   alert(`${langGlobal.max_5_arquivos_upload} `);
        //   return;
        // }

        for (let i = 0; i < files.length; i++) {
          _imagesArrayUpload.push(files[i]);
        }
        __displayImagesUpload();
      });
    }
  }

  function __displayImagesUpload() {
    let images = "";
    _imagesArrayUpload.forEach((image, index) => {
      images += `<div class="image">
              <img src="${URL.createObjectURL(image)}" alt="image">
              <span onclick="CarroGaleria.deleteImageUpload(${index})">&times;</span>
            </div>`;
    });

    const output = document.querySelector(".img_output");
    output.innerHTML = images;
  }

  function __deleteImageUpload(index) {
    _imagesArrayUpload.splice(index, 1);
    __displayImagesUpload();
  }

  function __deleteGalleryFoto(fotoId) {
    const id = $("#id", _formId).val();
    Notify.confirm(
      "Você confirma a exclusão do registro?<br />Após a confirmação será impossível reverter o comando.",
      function () {
        $.ajax({
          type: "DELETE",
          url: "/admin/carros/" + id + "/galeria-foto/" + fotoId,
          dataType: "json",
          timeout: 120000,
          success: function (json) {
            $("#confirmModal").modal("hide");
            $(_modalId).modal("hide");
            Notify.success(json.message);
            setTimeout(() => {
              Carro.update(json.data.id);
            }, 1500);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            ServiceHttp.exceptionAjax(jqXHR, textStatus, errorThrown);
          },
        });
      }
    );
  }

  function __deleteGalleryFotoAllChecked(fotos) {
    const id = $("#id", _formId).val();
    Notify.confirm(
      "Você confirma a exclusão do registro?<br />Após a confirmação será impossível reverter o comando.",
      function () {
        $.ajax({
          type: "POST",
          url: "/admin/carros/" + id + "/galeria-foto-all-checked",
          dataType: "json",
          timeout: 120000,
          data: { fotos },
          success: function (json) {
            $("#confirmModal").modal("hide");
            $(_modalId).modal("hide");
            Notify.success(json.message);
            setTimeout(() => {
              Carro.update(json.data.id);
            }, 1500);
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
    deleteGalleryFoto: __deleteGalleryFoto,
    deleteImageUpload: __deleteImageUpload,
  };
})();
