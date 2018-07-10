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

var delUser = function(url1) {
    $.ajax({
        url: url1,
        type: 'POST',
        success: function (data) {
            console.log('data: '+data)
        }
    });
}

var del = function(event,url,parent) {
    event.preventDefault();
    parent.fadeOut(1000,function(){
        parent.remove();
    });
    delUser(url);
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