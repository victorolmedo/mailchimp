# mailchimp
Cliente mailchimp




#Agregar API KEY y LIST ID

$( "#submit" ).click(function() {
var correo =$("#mail").val();
  		$.ajax({
        type: "POST",
        url: "mailchimpClient.php",
        data: "mail="+correo,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		//$("#resultados").html(datos);		
		//alert(datos);
		if(datos=="Subscriber added successfully."){
		alert("suscripto exitosamente!!!")
		}else{
		alert("ALERTA:\n ::: Revise si su correo es válido :::")
		}
		
		}
			});
});
