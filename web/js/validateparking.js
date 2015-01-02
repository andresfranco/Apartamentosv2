$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_parking[locationid]":{
                required:true
               
            },
           
            
            "apartamentos_apartamentosbundle_parking[number]":{
                required:true
               
            },
            
            "apartamentos_apartamentosbundle_parking[type]":{
              
                 required:true     
            },
            "apartamentos_apartamentosbundle_parking[apartmentid]":{
              
                 required:true     
            }
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_parking[locationid]":{
                required:"Debe seleccionar una localización"
               
            },
           
            
            "apartamentos_apartamentosbundle_parking[number]":{
                required:"Debe seleccionar un número de estacionamiento"
               
            },
            
            "apartamentos_apartamentosbundle_parking[type]":{
              
                 required:"Debe seleccionar un tipo de estacionamiento"    
            },
            "apartamentos_apartamentosbundle_parking[apartmentid]":{
              
                 required:"Debe seleccionar un apartamento"    
            }
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

