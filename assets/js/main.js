
function logout() {
    $.ajax({
        url: BASE_URL + 'login/logout',
        type: 'POST'
    });
    setTimeout(function(){
        window.location.reload();
    },500)
}

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

// Função responsável por deletar imagem
$('.btn-del-image').on('click', function(ev){    
    var id = $(this).attr('id');
    $control = $(this).attr('data-class');
    $.get(BASE_URL+$control+'/deleteImage/'+id, function(data){
        console.log('Data: ' +data);
        window.location.reload();
    })
    
    
});

// função responsável por deletar os itens do sistema
var callActionUrl = function(url1) { 
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
    if (window.confirm("Deseja realmente inativar esse "+name+"?")) {
        parent.fadeOut(500,function(){
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
