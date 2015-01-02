$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_car[platenumber]":{
                required:true
               
            },
            
            "apartamentos_apartamentosbundle_car[brand]":{
                required:true
               
            },
            
            "apartamentos_apartamentosbundle_car[color]":{
                required:true
               
            },
             "apartamentos_apartamentosbundle_car[apartmentid]":{
                required:true
               
            },
             "apartamentos_apartamentosbundle_car[residentid]":{
                required:true
               
            }
           
            
           
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_car[platenumber]":{
                required:"Debe ingresar un número de placa"
               
            },
            
            "apartamentos_apartamentosbundle_car[brand]":{
                required:"Debe seleccionar una marca"
               
            },
            
            "apartamentos_apartamentosbundle_car[color]":{
                required:"Debe ingresar un color"
               
            },
             "apartamentos_apartamentosbundle_car[apartmentid]":{
                required:"Debe seleccionar un apartamento"
               
            },
             "apartamentos_apartamentosbundle_car[residentid]":{
                required:"Debe seleccionar un propietario"
               
            }
           
            

        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });


