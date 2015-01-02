$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
        
		
		
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_tower[name]": "required",
            "apartamentos_apartamentosbundle_tower[email]" :"email",
            "apartamentos_apartamentosbundle_tower[numberapartments]" :"digits",
            "apartamentos_apartamentosbundle_tower[numberstorerooms]" :"digits",
            "apartamentos_apartamentosbundle_tower[numberparkings]" :"digits",
            "apartamentos_apartamentosbundle_tower[numberaptperfloor]" :"digits"
    
        },
        
        // Specify the validation error messages
        messages: {
           "apartamentos_apartamentosbundle_tower[name]": "Debe Ingresar un Nombre",
           "apartamentos_apartamentosbundle_tower[email]" :"Debe ingresar un email válido",
           "apartamentos_apartamentosbundle_tower[numberapartments]" :"El número de apartamentos debe ser un número entero",
           "apartamentos_apartamentosbundle_tower[numberstorerooms]" :"El número de depósitos debe ser un número entero",
           "apartamentos_apartamentosbundle_tower[numberparkings]" :"El número de estacionamientos debe ser un número entero",
           "apartamentos_apartamentosbundle_tower[numberaptperfloor]" :"la cantidad de apartamentos por piso debe ser un número entero"
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });


