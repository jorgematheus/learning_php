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

function feedbackSuccess(message) {
    var feed = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    '<i class="fas fa-check-circle fa-fw"> </i> <strong>'+message+'</strong>'+ 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';
        var body = $(feed).insertAfter("h3");
    return body;
}

function feedbackError(message) {
    var feed = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
                  '<i class="fas fa-exclamation-triangle fa-fw"></i> <strong>'+message+'</strong>'+ 
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                '</div>';
        var body = $(feed).insertAfter("h3");
    return body;
}