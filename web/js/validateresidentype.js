$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
        
		
		
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_residenttype[type]": "required",
            
        },
        
        // Specify the validation error messages
        messages: {
           "apartamentos_apartamentosbundle_residenttype[type]": "Debe ingresar el tipo de residente",
           
           
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

