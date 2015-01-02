$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_location[location]":{
                required:true
               
            }
           
            
           
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_location[location]":{
                required:"Debe Ingresar una localización"
                
            }
           
            

        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
