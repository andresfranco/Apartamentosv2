
$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_expense[description]":{
                required:true
               
            },
           
            
            "apartamentos_apartamentosbundle_expense[causeid]":{
                required:true
               
            },
            
            "apartamentos_apartamentosbundle_expense[amount]":{
                 required:true,
                 number:true     
            },
            
        "apartamentos_apartamentosbundle_expense[towerid]":{
                required:true
        },
        "apartamentos_apartamentosbundle_expense[expensedate]":{
                required:true,
                date:true
        }
        },
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_expense[description]":{
                required:"Debe Ingresar una descripción"
                
            },
           
            
            "apartamentos_apartamentosbundle_expense[causeid]":{
                required:"Debe seleccionar una causa"
                
            },
            
            "apartamentos_apartamentosbundle_expense[amount]":{
                 required:"Debe ingresar un monto",
                 number:"El monto debe ser un número"    
            },
        
         "apartamentos_apartamentosbundle_expense[towerid]":{
                required:"Debe seleccionar una torre"
        },
        "apartamentos_apartamentosbundle_expense[expensedate]":{
                required:"Debe ingresar una fecha",
                date: "La fecha debe tener un formato válido"
        }
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });


  });
