$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_color[color]":{
                required:true
               
            }
           
            
           
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_color[color]":{
                required:"Debe Ingresar un Color"
                
            }
           
            

        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

