function callModalEdit(modalName,view) {
    $(document).ready( function(){
        $('#btn-modal').trigger('click');
        setTimeout(function () {
            $(modalName).modal('hide')
            window.location.href=BASE_URL+view;
        }, 2000);
    });
    $(modalName).modal();
}

function callModalAdd(modalName) {
    $(document).ready( function(){
        $('#btn-modal').trigger('click');
        setTimeout(function () {
            $(modalName).modal('hide')
        }, 2000);
    });
    $(modalName).modal();
}

function callModalRecoveryTrash(modalName) {
    $(document).ready( function(){
        $('#btn-modal').trigger('click');
        setTimeout(function () {
            $(modalName).modal('hide')
        }, 2000);
    });
    $(modalName).modal();
}
/*Datepicker*/
let callDatePicker = () => {
    $('.input-date input').datepicker({
        format: "dd/mm/yyyy",
        startView: 2,
        language: "pt-BR",
        autoclose: true,
        datesDisabled: ['07/06/2018', '07/21/2018']
    });
}

/*******************************************************************| 
| Função resonsável por exibir feedbacks de sucesso                 |
|  @params: 1: Mensagem a ser exibida.                              |
|  2: Página a ser redirecionada após timeout (Opcional)            |
|  @return: Retorna um elemento na página para exibição de feedback |
********************************************************************/

function feedbackSuccess(message, redirectPage = []) {
    var feed = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    '<i class="fas fa-check-circle fa-fw"> </i> <strong>'+message+'</strong>'+ 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';
        var body = $(feed).insertAfter("h3");

    if(redirectPage.length != 0) {
        setTimeout(function(){
            window.location = BASE_URL+redirectPage;
        },2000)
    }

    return body;    
}

/*******************************************************************| 
| Função resonsável por exibir feedbacks de erros                   |
|  @params: 1: Mensagem a ser exibida.                              |
|  2: Página a ser redirecionada após timeout (Opcional)            |
|  @return: Retorna um elemento na página para exibição de feedback |
********************************************************************/

function feedbackError(message, redirectPage = []) {
    var feed = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                  '<i class="fas fa-exclamation-triangle fa-fw"></i> <strong>'+message+'</strong>'+ 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';
        var body = $(feed).insertAfter("h3");
    
    if(redirectPage.length != 0) {
        setTimeout(function(){
            window.location = BASE_URL+redirectPage;
        });
    }

    return body;
}

