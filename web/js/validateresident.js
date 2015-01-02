$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_resident[name]":{
                required:true
               
            },
           
            
            "apartamentos_apartamentosbundle_resident[idnumber]":{
                required:true
               
            },
            
            "apartamentos_apartamentosbundle_resident[idnumbertype]":{
                 required:true,
                   
            },
            "apartamentos_apartamentosbundle_resident[apartmentid]":{
                required:true
        }
        ,
         "apartamentos_apartamentosbundle_resident[towerid]":{
                required:true
        }
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_resident[name]":{
                required:"Debe Ingresar el nombre del residente"
                
            },
           
            
            "apartamentos_apartamentosbundle_resident[idnumber]":{
                required:"Debe ingresar un número de identificación"
                
            },
            
            "apartamentos_apartamentosbundle_resident[idnumbertype]":{
                 required:"Debe ingresar un tipo de indentificación",
                  
            },
            "apartamentos_apartamentosbundle_resident[apartmentid]":{
                required:"Debe seleccionar un apartamento"
        },
          "apartamentos_apartamentosbundle_resident[towerid]":{
                required:"Debe seleccionar una torre"
        }
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

