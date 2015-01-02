$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_brand[brand]":{
                required:true
               
            }
           
            
           
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_brand[brand]":{
                required:"Debe Ingresar una marca"
                
            }
           
            

        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

