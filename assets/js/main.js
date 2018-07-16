var email = $('#email').val(),
    password = $('#password').val();

const validLogin = function() {
    let regex_email = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i;
    if (!regex_email.test(email)) {
        $('#feedback-login').html('Email Incorreto!');
        return false;
    }
    return true;
}

var callDelUser = function(url1) { // função responsável por deletar usuário
    $.ajax({
        url: url1,
        type: 'POST',
        success: function (data) {
            console.log('data: '+data)
        }
    });
}

var deleteUser = function(event,url,parent) {
    event.preventDefault();
    if (window.confirm("Deseja realmente excluir esse usuário?")) {
        parent.fadeOut(1000,function(){
            parent.remove();
        });
        callDelUser(url);
    }

}

function callModal(modalName) {
    $(document).ready( function(){
        $('#btn-modal').trigger('click');
        setTimeout(function () {
            $(modalName).modal('hide')
            window.location.href=BASE_URL+'users';
        }, 2000);
    });
    $(modalName).modal();
}
