/*$('#login').on('click', function(ev){
    ev.preventDefault();
    let email = $('#email').val(),
    password = $('#password').val();

    $.ajax({
        url: BASE_URL+'login',
        type: 'POST',
        data: {
            'email' : email,
            'password': password
        },
        success: function(tes) {
            alert(tes.msg)
        }

    });
    
});*/


function logout() {
    $.ajax({
        url: BASE_URL + 'login/logout',
        type: 'POST'
    });
    setTimeout(function(){
        window.location.reload();
    },500)
}

function validLogin () {
    var email = $('#email').val(),
        password = $('#password').val();
    var regex_email = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/i;
    
    if(!regex_email.test(email)) {
       $('#error-c').html('error')
        return false;
    } 

    if(password == "") {
        alert('vazio')
        return false;
    }

    return true;
}

// Função responsável por deletar imagem
$('.btn-del-image').on('click', function(ev){    
    var id = $(this).attr('id');
    $control = $(this).attr('data-class');
    $.get(BASE_URL+$control+'/deleteImage/'+id, function(data){
        //console.log('Data: ' +data);
        
    })  
    setTimeout(function(){
        window.location.reload();
    },1000)  
    
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

$('.btn-register').on('click', function(){
    let ids = this.getAttribute("data-ids");
    $.ajax({
        url: BASE_URL+'course/registerCourse/'+ids,
        type: 'GET',
        beforeSend: function() { $('.btn-register').prop('disabled', true) },
        success: function() { window.location.href = BASE_URL+'course/myCourses' }
    });    
});

// salva a aba selecionada para não ser perdida ao dar refresh na página
$('a[data-toggle="pill"]').on('show.bs.tab', function (e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
 }); 
 
 //Obtém os dados da localStorage
 var activeTab = localStorage.getItem('activeTab');
 
 console.log(activeTab);
 
 if (activeTab) {
    $('a[href="' + activeTab + '"]').tab('show');
 }
 
