$(document).ready(function() {
    validamascotas();
    validaninos(); 
  
    $("#apartamentos_apartamentosbundle_apartment_haspet").change(function() { validamascotas(); });
    $("#apartamentos_apartamentosbundle_apartment_haskids").change(function() { validaninos(); });
});

function validamascotas()
{
    if ($("#apartamentos_apartamentosbundle_apartment_haspet").val() == "S")
        $("#apartamentos_apartamentosbundle_apartment_petkind").show(),    
        $("#apartamentos_apartamentosbundle_apartment_petnumber").show(),
        $('label[for="apartamentos_apartamentosbundle_apartment_petkind"]').show(),
        $('label[for="apartamentos_apartamentosbundle_apartment_petnumber"]').show();
    else
        $("#apartamentos_apartamentosbundle_apartment_petkind").hide(),
        $("#apartamentos_apartamentosbundle_apartment_petkind").val(""),    
        $("#apartamentos_apartamentosbundle_apartment_petnumber").hide(),
        $("#apartamentos_apartamentosbundle_apartment_petnumber").val(""),
        $('label[for="apartamentos_apartamentosbundle_apartment_petkind"]').hide(),
        $('label[for="apartamentos_apartamentosbundle_apartment_petnumber"]').hide();
}

function validaninos()
{
  if ($("#apartamentos_apartamentosbundle_apartment_haskids").val()=="S")  
    $("#apartamentos_apartamentosbundle_apartment_numberofkids").show(),
    $('label[for="apartamentos_apartamentosbundle_apartment_numberofkids"]').show();    
  else
    $("#apartamentos_apartamentosbundle_apartment_numberofkids").hide(),
    $("#apartamentos_apartamentosbundle_apartment_numberofkids").val(""),    
    $('label[for="apartamentos_apartamentosbundle_apartment_numberofkids"]').hide();    
    
}

$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
        
		
		
        // Specify the validation rules
        rules: {
            "apartamentos_apartamentosbundle_apartment[phone]":{
                required:true,
                digits:true
            },
            "apartamentos_apartamentosbundle_apartment[number]" :"required",
            "apartamentos_apartamentosbundle_apartment[numberresidents]":"required",
            
            "apartamentos_apartamentosbundle_apartment[floornumber]":{
                required:true,
                digits:true 
            },
            "apartamentos_apartamentosbundle_apartment[petkind]":
             {
               required:function(element) {
                    return ($('#apartamentos_apartamentosbundle_apartment_haspet').val() == 'S');
                }  
             },        
            "apartamentos_apartamentosbundle_apartment[petnumber]":{
                required:function(element) {
                    return ($('#apartamentos_apartamentosbundle_apartment_haspet').val() == 'S');
                }, 
                digits:true
            },
            "apartamentos_apartamentosbundle_apartment[numberofkids]":{
                required:function(element) {
                    return ($('#apartamentos_apartamentosbundle_apartment_haskids').val() == 'S');
                },
                digits:true
            },
            "apartamentos_apartamentosbundle_apartment[companyid]":{
                required:true
               
            },
            "apartamentos_apartamentosbundle_apartment[towerid]":{
                required:true
               
            }
              
    
        },
        
        // Specify the validation error messages
        messages: {
            "apartamentos_apartamentosbundle_apartment[phone]":
             {
            required:"Debe ingresar un múmero de teléfono",
            digits:"El valor debe ser numérico"
            },
            "apartamentos_apartamentosbundle_apartment[number]":"Debe ingresar un número de apartamento",
            "apartamentos_apartamentosbundle_apartment[numberresidents]":"Debe ingresar la cantidad de residentes",
            "apartamentos_apartamentosbundle_apartment[floornumber]":{
               required: "Debe ingresar el número de piso",
               digits:"El número de piso debe ser numérico"
            },
            "apartamentos_apartamentosbundle_apartment[petkind]":{
              required:"Debe ingresar un tipo de mascota"  
            },
            "apartamentos_apartamentosbundle_apartment[petnumber]":{
                required:"Debe ingresar la cantidad de mascotas",
                digits:"la cantidad de mascotas debe ser un valor numérico"
            },
            "apartamentos_apartamentosbundle_apartment[numberofkids]":{
              required:"Debe ingresar la cantidad de niños",  
              digits:"la cantidad de niños debe ser un valor numérico"
            },
            "apartamentos_apartamentosbundle_apartment[companyid]":{
                required:"Debe seleccionar un condominio"
               
            },
            "apartamentos_apartamentosbundle_apartment[towerid]":{
                required:"Debe seleccionar una torre"
               
            }
        
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  


