$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_cause[cause]":{
                required:true
               
            }
           
            
           
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_cause[cause]":{
                required:"Debe Ingresar una causa"
                
            }
           
            

        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

