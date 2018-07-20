var validLogin = function() {
    var email = $('#email').val(),
        password = $('#password').val();
    let regex_email = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i;
    if (!regex_email.test(email)) {
        $('.feedback-invalid').html('Email Incorreto!');
        return false;
    } else {


    }
}
var callActionUrl = function(url1) { // função responsável por deletar usuário
    $.ajax({
        url: url1,
        type: 'POST'
    });
}
/*
* Função responsável por realizar as ações de delete
* params: 1: será sempre event. 2: A url(guardada no link que é o target da função)
* 3: responsável por realiza o efeito de fadeOut e remover o elemento da tela
* 4:nome do dado a ser deletado
*/

var callDelete = function(event,url,parent,name) {
    event.preventDefault();
    if (window.confirm("Deseja realmente deletar esse "+name+"?")) {
        parent.fadeOut(1000,function(){
            parent.remove();
        });
        callActionUrl(url);
    }
}

/*
*
* Função responsável por realizar as ações para restaurar os dados da lixeira
*  params: 1: será sempre event. 2: A url(guardada no link que é o target da função)
* 3: responsável por realiza o efeito de fadeOut e remover o elemento da tela
* 4:nome do dado a ser restaurado
*
*/

function callRecoveryTrash(event,url,parent,name) {
    event.preventDefault();
    if (window.confirm("Deseja realmente restaurar esse "+name+"?")) {
        parent.fadeOut(1000,function(){
            parent.remove();
        });
        callActionUrl(url);
    }
}

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
