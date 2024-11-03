var ServiceHttp = (function () {
//    var _url = '';
//    var _V = '';
//    var _loader = '';
//
//    function __get(action, method, data) {
//        data = 'token=' + Service.getToken() + (data != '' ? '&' + data : '');
//        return $.ajax({
//            type: method,
//            url: _url + 'api/' + _V + action,
//            data: data,
//            // contentType: "application/json; charset=utf-8",
//            dataType: "json",
//            crossDomain: true,
////            headers: {
////                "Authorization": "Basic " + btoa(Service.getToken()),
////            }
////	    timeout: 10000
//        }).error(function (jqXHR, status, text) {
//            __exception(jqXHR, status, text);
//        });
//    }
//
//
//    function __getComImg(action, method, element) {
//        var formdata = new FormData(element);
//        formdata.append("token", Service.getToken());
//
//        return $.ajax({
//            url: _url + 'api/' + _V + action, // Url to which the request is send
//            type: method, // Type of request to be send, called as method
//            data: formdata, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
//            contentType: false, // The content type used when sending data to the server.
//            cache: false, // To unable request pages to be cached
//            processData: false, // To send DOMDocument or non processed data file it is set to false
//            dataType: "json",
//            timeout: 60000
//        }).error(function (jqXHR, status, text) {
//            __exception(jqXHR, status, text);
//        });
//    }


    function __exceptionAjax(jqXHR, textStatus, errorThrown) {
        var obj = jqXHR.responseText;

        if (Validator.IsJsonString(obj)) {
            obj = JSON.parse(jqXHR.responseText);
        }
        
        $.unloadmask();
        __exception(jqXHR.status, obj.message);
    }

    function __exceptionLoad(responseText, textStatus, XMLHttpRequest) {
        $.unloadmask();
        __exception(XMLHttpRequest.status,responseText);
    }

    function __exception(statusCode, message) {

        switch (statusCode) {
            case 400:
                {
                    Notify.error(message);
                }
                break;
            case 401:
                {
                    Notify.error("Acesso negado! (401)");
                }
                break;
            case 403:
                {
                    Notify.error("A solicitação não foi liberada para esta requisição! (403)");
                }
                break;
            case 404:
                {
                    Notify.error("A solicitação não esta disponível no servidor! (404)");
                }
                break;
            case 405:
                {
                    Notify.error("A solicitação foi feita através de um método não permitido pelo servidor!  (405)");
                }
                break;
            case 408:
                {
                    Notify.timeout("O servidor excedeu o tempo limite de espera! (408)");
                }
                break;
            case 414:
                {
                    Notify.error("O endereço fornecido (URL) é muito longo para que o servidor possa processar! (414)");
                }
                break;
            case 419:
                {
                    Notify.timeout("O servidor excedeu o tempo limite de espera! (419)");
                }
                break;
            case 500:
                {
                    Notify.error("Erro do servidor! (500)");
                }
                break;
            default:
                {
                    Notify.error("Erro de processamento não identificado! ");
                }
                break;
        }
    }


    return {
        exceptionAjax: __exceptionAjax,
        exceptionLoad: __exceptionLoad
//        getComImg: __getComImg,
//        get: __get,
//        init: function (container) {
//            _url = container.get('url');
//            _V = container.get('_V_');
//            _loader = container.get('service-loader');
//            return this;
//        }
    };
})();