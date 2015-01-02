/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/
$(document).ready(function()
{
	//global vars
	
	var form = $("#frmusuario");
	
	var usuario = $("#usuario_form_usuario");
        var usuarioInfo=$("#usuarioInfo");
	var password=$("#usuario_form_usuario");
	var passwordInfo=$("#passwordInfo");
	//On blur
        
      
	
	usuario.blur(validardatos);
	password.blur(validardatos);
	//On key press
	usuario.keyup(validardatos);
	password.keyup(validardatos);
	//On Submitting
	form.submit(function(){
		if(validardatos())
			return true
		else
			return false;
	});
	
	

	function validardatos(){
		  alert('entro');
	    var errorusuario=0;
		var errorpassword=0;
		if (usuario.val().length == 0)
		{
		usuario.addClass("error");
		usuarioInfo.text("Debe llenar el campo de usuario");
		usuarioInfo.addClass("error");
		
		errorusuario=1;
		}
		else
		{
		usuario.removeClass("error");
		usuarioInfo.text("");
		usuarioInfo.removeClass("error");
		errorusuario=0;
			
		}
		
		if (password.val().length == 0)
		{
		password.addClass("error");
		passwordInfo.text("Debe llenar el campo de password");
		passwordInfo.addClass("error");
		
		errorpassword=1;
		}
		else
		{
		password.removeClass("error");
		passwordInfo.text("");
		passwordInfo.removeClass("error");
		errorpassword=0;
			
		}
		
		if ((errorusuario==0)&&(errorpassword==0))
		{
		return true;	
			
		}
		else
		{
		return false;	
		}
		
	}
	
	
	
	
});