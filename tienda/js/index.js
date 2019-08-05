$(document).ready(function(){

    $("#logines").click(function(){
         $(".loading").show;
         usuario=$("#usuario").val();
         contrasena=$("#contrasena").val();


          $.ajax({
             type: "POST",
             url: urlServicios + "control.php",
             data: "usuario="+usuario+"&contrasena="+contrasena,
             dataType: "html",
             success: function(html){
               var res = html.split("|");
               ///alert(res[0]);
               if(res[0]=='1')
               {
                 $.session.set("user", res[1]);
                 $.session.set("nombreapellido", res[2]);
                 $.session.set("razon_social", res[3]);
                 $.session.set("iduser", res[4]);

                 $(location).attr('href','home.html')
                 
               }
               else
               {
                 var res = html.split("|");

                     if(res[1]==1)
                     {
                         $(".mensagem-erro").html("*Usuario deshabilitado");
                     }
                     if(res[1]==2)
                     {
                         $(".mensagem-erro").html("*Error de Usuario");
                     }
                     if(res[1]==3)
                     {
                         $(".mensagem-erro").html("*Error de Contrase&ntilde;a");
                     }
                     
                     ///$(".loading").hide;
               }
             },
             beforeSend:function()
             {
                  $(".loading").show;
             }
         });
          return false;
     });
 });