$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
       	
        // Specify the validation rules
        rules: {
            
            "apartamentos_apartamentosbundle_employee[companyid]":
             {
                required:true        
             },        
            "apartamentos_apartamentosbundle_employee[completename]":{
                required:true
               
            },
           
            
            "apartamentos_apartamentosbundle_employee[idnumber]":{
                required:true
               
            },
            
            "apartamentos_apartamentosbundle_employee[salaryamount]":{
                 required:true,
                 number:true     
            },
            "apartamentos_apartamentosbundle_employee[position]":{
                required:true
        }
        },
        // Specify the validation error messages
        messages: {
            
            "apartamentos_apartamentosbundle_employee[companyid]":
             {
                required:"Debe seleccionar un condominio"       
             },
            "apartamentos_apartamentosbundle_employee[completename]":{
                required:"Debe Ingresar el nombre completo del empleado"
                
            },
           
            
            "apartamentos_apartamentosbundle_employee[idnumber]":{
                required:"Debe ingresar el número de cédula del empleado"
                
            },
            
            "apartamentos_apartamentosbundle_employee[salaryamount]":{
                 required:"Debe ingresar el salario del empleado",
                 number:"El salario del empleado debe ser un número"    
            },
            "apartamentos_apartamentosbundle_employee[position]":{
                required:"Debe ingresar el cargo del empleado"
        }
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
