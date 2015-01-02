$(function() {

    // Setup form validation on the #register-form element
    $("#form").validate({
        
       rules: {
            "login_loginbundle_user[password]":{
                required:true,
                minlength: 6
            },	
        // Specify the validation rules
        
            "login_loginbundle_user[username]": "required",
             
        },
        
        // Specify the validation error messages
        messages: {
           "login_loginbundle_user[username]": "Ingrese un usuario",
           "login_loginbundle_user[password]":{
                required:"Ingrese un password",
                minlength:"El password debe ser de mínimo 6 caracteres"
            }
           
        },
       
        submitHandler: function(form) {
            form.submit();
        }
    });

  });

