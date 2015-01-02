$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_provider[name]":{
                required:true
               
            },
           
            
            "apartamentos_apartamentosbundle_provider[email]":{
                email:true
               
            },
            
            "apartamentos_apartamentosbundle_provider[phone]":{
              
                 number:true     
            }
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_provider[name]":{
                required:"Debe Ingresar el nombre del proveedor"
                
            },
           
            
            "apartamentos_apartamentosbundle_provider[email]":{
                email:"Debe ingresar un email válido"
                
            },
            
            "apartamentos_apartamentosbundle_provider[phone]":{
               
                 number:"El teléfono debe ser un número"    
            }
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });



