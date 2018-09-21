//form class
$( "#form-class").validate({
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

 //form course
  $( "#form-course").validate({
    //debug: true,
    rules: {    
      'course-title': {
        required: true,
        minlength: 3,
        maxlength: 100                  
      },
      'course-description': {        
        minlength: 3,
        maxlength: 255                  
      }                  
    },
    messages:{                    
       'course-title': {
                  required: "Campo obrigatório!",
                  minlength: "O tamanho mínimo permitido é de 3 caracters!",
                  maxlength: "O tamanho máximo permitido é de 100 caracters!"
        },
        'course-description': {            
            minlength: "O tamanho mínimo permitido é de 3 caracters!",
            maxlength: "O tamanho máximo permitido é de 255 caracters!"
         },
    }
  });
  
  //form lesson
  $( "#form-lesson").validate({
    //debug: true,
    rules: {    
      'lesson-title': {
        required: true,
        minlength: 3,
        maxlength: 100                  
      },
      'lesson-description': {        
        minlength: 3,
        maxlength: 255                  
      }                  
    },
    messages:{                    
       'lesson-title': {
                  required: "Campo obrigatório!",
                  minlength: "O tamanho mínimo permitido é de 3 caracters!",
                  maxlength: "O tamanho máximo permitido é de 100 caracters!"
        },
        'lesson-description': {            
            minlength: "O tamanho mínimo permitido é de 3 caracters!",
            maxlength: "O tamanho máximo permitido é de 255 caracters!"
         },
    }
  });

 //form content
  $( "#form-content").validate({
    //debug: true,
    rules: {    
      'content-title': {
        required: true,
        minlength: 3,
        maxlength: 100                  
      },
      'content-description': {        
        minlength: 3,
        maxlength: 255                  
      },
      'content': {
        required: true
      }                 
    },
    messages:{                    
       'content-title': {
                  required: "Campo obrigatório!",
                  minlength: "O tamanho mínimo permitido é de 3 caracters!",
                  maxlength: "O tamanho máximo permitido é de 100 caracters!"
        },
        'content-description': {            
            minlength: "O tamanho mínimo permitido é de 3 caracters!",
            maxlength: "O tamanho máximo permitido é de 255 caracters!"
         },
         'content': {
           required: "Campo obrigatório!"
         }
    }
  });

   //form user
   $( "#form-user").validate({
    //debug: true,
    rules: {    
      'name': {
        required: true,
        minlength: 3,
        maxlength: 100                  
      },
      'email': {        
        minlength: 3,
        maxlength: 100,
        email: true,
        required: true                
      },
      'type_user': {
        required: true
      },
      'password': {
        minlength: 3,
        maxlength: 32,        
      }              
    },
    messages:{                    
       'name': {
          required: "Campo obrigatório!",
          minlength: "O tamanho mínimo permitido é de 3 caracters!",
          maxlength: "O tamanho máximo permitido é de 100 caracters!"
        },
        'email': {            
            minlength: "O tamanho mínimo permitido é de 3 caracters!",
            maxlength: "O tamanho máximo permitido é de 100 caracters!",
            email: "Informe um e-mail válido!",
            required: "Campo obrigatório!"
         },
         'type_user': {
           required: "Campo obrigatório!"
         },
         'password': {
            required: "Campo obrigatório!",
            minlength: "O tamanho mínimo permitido é de 3 caracters!",
            maxlength: "O tamanho máximo permitido é de 32 caracters!" 
         }
    }
  });

  //form group
  $( "#form-group").validate({
    //debug: true,
    rules: {    
      'group-title': {
        required: true,
        minlength: 3,
        maxlength: 100                  
      },
      'group-description': {        
        minlength: 3,
        maxlength: 255                  
      }               
    },
    messages:{                    
       'group-title': {
                  required: "Campo obrigatório!",
                  minlength: "O tamanho mínimo permitido é de 3 caracters!",
                  maxlength: "O tamanho máximo permitido é de 100 caracters!"
        },
        'group-description': {            
            minlength: "O tamanho mínimo permitido é de 3 caracters!",
            maxlength: "O tamanho máximo permitido é de 255 caracters!"
         }
    }
  });
