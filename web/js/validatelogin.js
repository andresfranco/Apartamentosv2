$(function() {

    // Setup form validation on the #register-form element
    $("#loginform").validate({
    
        // Specify the validation rules
        rules: {
            _username: "required",
            _password: "required"
    
        },
        
        // Specify the validation error messages
        messages: {
            _username: "Ingrese un usuario",
            _password: "Ingrese un password"
           
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

