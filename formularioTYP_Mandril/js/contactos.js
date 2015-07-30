$(document).ready(function() {
	
	
	$("#contacto").validate({		
		submitHandler: function(form) {		    
		    
		    $("#boton").html('<a id="boton" href="#" class="medium button">ENVIANDO...</a>');
		    document.contacto.submit();
		    
		}
	});	
	
});
