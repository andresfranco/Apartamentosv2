$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
        
		
		
        // Specify the validation rules
        rules: {
            "login_loginbundle_role[name]": "required",
            
        },
        
        // Specify the validation error messages
        messages: {
           "login_loginbundle_role[name]": "Debe ingresar el nombre del rol",
           
           
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

