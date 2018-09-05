$( "#form-class" ).validate({
    //debug: true,
    rules: {    
      'class-title': {
        required: true,
        minlength: 3,
        maxlength: 100                  
      },
      'class-description': {        
        minlength: 3,
        maxlength: 255                  
      }                  
    },
    messages:{                    
       'class-title': {
                  required: "Campo obrigatório!",
                  minlength: "O tamanho mínimo permitido é de 3 caracters!",
                  maxlength: "O tamanho máximo permitido é de 100 caracters!"
        },
        'class-description': {            
            minlength: "O tamanho mínimo permitido é de 3 caracters!",
            maxlength: "O tamanho máximo permitido é de 255 caracters!"
         },
    }
  });