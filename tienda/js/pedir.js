(function($){
$(document).ready(function(){

    /// CONTROLO SI AGREGO O ELIMINO

    var eliminar = getParameterByName('eliminar');
    var tama = getParameterByName('tama');

    if (eliminar=="") {
        var bandera = 0;
        var usuario = $.session.get("user");
        if (usuario === undefined) {
            window.location.href = "index.html";
        } 
        ////Contenido///
        var color = getParameterByName('color');
        var talle_s = getParameterByName('talle_s');
        var talle_m = getParameterByName('talle_m');
        var talle_l = getParameterByName('talle_l');
        var talle_xl = getParameterByName('talle_xl');
        var talle_xxl = getParameterByName('talle_xxl');
        var talle_xxxl = getParameterByName('talle_xxxl');
        var talle_xxxxl = getParameterByName('talle_xxxxl');
        var talle_1 = getParameterByName('talle_1');
        var talle_2 = getParameterByName('talle_2');
        var talle_3 = getParameterByName('talle_3');
        var talle_4 = getParameterByName('talle_4');
        var talle_5 = getParameterByName('talle_5');
        var talle_6 = getParameterByName('talle_6');
        var vid = getParameterByName('vid');
        var id = getParameterByName('id');
        var titulo = getParameterByName('titulo');
        var precio1 = getParameterByName('precio1');
        var precio2 = getParameterByName('precio2');
        var imagenp = getParameterByName('imagenp');
        var articulo = getParameterByName('articulo');

        var vm1 = getParameterByName('vm1');
        var vm2 = getParameterByName('vm2');
        var vm3 = getParameterByName('vm3');
        var vm4 = getParameterByName('vm4');
        var vm5 = getParameterByName('vm5');
        var vm6 = getParameterByName('vm6');
        var vm7 = getParameterByName('vm7');
        var vm8 = getParameterByName('vm8');
        var vm9 = getParameterByName('vm9');
        var vm10 = getParameterByName('vm10');
        var vm11 = getParameterByName('vm11');
        var vm12 = getParameterByName('vm12');
        var vm13 = getParameterByName('vm13');
        
        // update Qty if product is already 
        for (i = 0; i < cart.length; i++) {
            if(cart[i].Titulo == titulo)
            {
                cart[i].Talle_s = talle_s; 
                cart[i].Talle_m = talle_m; 
                cart[i].Talle_l = talle_l; 
                cart[i].Talle_xl = talle_xl; 
                cart[i].Talle_xxl = talle_xxl; 
                cart[i].Talle_xxxl = talle_xxxl; 
                cart[i].Talle_xxxxl = talle_xxxxl; 
                cart[i].Talle_1 = talle_1; 
                cart[i].Talle_2 = talle_2; 
                cart[i].Talle_3 = talle_3; 
                cart[i].Talle_4 = talle_4; 
                cart[i].Talle_5 = talle_5; 
                cart[i].Talle_6 = talle_6; 
                saveCart();
                bandera = 1;
            }
        }
        if (bandera==0){
            var item = { 
                Titulo: titulo, 
                Precio1: precio1, 
                Precio2: precio2,
                Color: color, 
                Talle_s: talle_s,
                Talle_m: talle_m, 
                Talle_l: talle_l, 
                Talle_xl: talle_xl, 
                Talle_xxl: talle_xxl, 
                Talle_xxxl: talle_xxxl,
                Talle_xxxxl: talle_xxxxl,
                Talle_1: talle_1, 
                Talle_2: talle_2, 
                Talle_3: talle_3, 
                Talle_4: talle_4, 
                Talle_5: talle_5, 
                Talle_6: talle_6, 
                M1: vm1, 
                M2: vm2, 
                M3: vm3, 
                M4: vm4, 
                M5: vm5, 
                M6: vm6, 
                M7: vm7, 
                M8: vm8, 
                M9: vm9, 
                M10: vm10, 
                M11: vm11, 
                M12: vm12, 
                M13: vm13, 
                Vid: vid, 
                Imagenp: imagenp, 
                Articulo: articulo,
                Id: id
            };
            cart.push(item);
            saveCart();
        }
    } else {

        // update Qty if product is already 
        for (i = 0; i < cart.length; i++) {
            if(cart[i].Titulo == eliminar)
            {
                if (tama==1) {
                    cart[i].Talle_s = 0; 
                }
                if (tama==2) {
                    cart[i].Talle_m = 0; 
                }
                if (tama==3) {
                    cart[i].Talle_l = 0; 
                }
                if (tama==4) {
                    cart[i].Talle_xl = 0; 
                }
                if (tama==5) {
                    cart[i].Talle_xxl = 0; 
                }
                if (tama==6) {
                    cart[i].Talle_xxxl = 0; 
                }
                if (tama==7) {
                    cart[i].Talle_xxxxl = 0; 
                }
                if (tama==8) {
                    cart[i].Talle_1 = 0; 
                }
                if (tama==9) {
                    cart[i].Talle_2 = 0; 
                }
                if (tama==10) {
                    cart[i].Talle_3 = 0; 
                }
                if (tama==11) {
                    cart[i].Talle_4 = 0; 
                }
                if (tama==12) {
                    cart[i].Talle_5 = 0; 
                }
                if (tama==13) {
                    cart[i].Talle_6 = 0; 
                }
                if (
                    (cart[i].Talle_s==0) &&
                    (cart[i].Talle_m==0) &&
                    (cart[i].Talle_l==0) &&
                    (cart[i].Talle_xl==0) &&
                    (cart[i].Talle_xxl==0) &&
                    (cart[i].Talle_xxxl==0) &&
                    (cart[i].Talle_xxxxl==0) &&
                    (cart[i].Talle_1==0) &&
                    (cart[i].Talle_2==0) &&
                    (cart[i].Talle_3==0) &&
                    (cart[i].Talle_4==0) &&
                    (cart[i].Talle_5==0) &&
                    (cart[i].Talle_6==0)
                )
                {
                    localStorage.removeItem(cart[i]);
                }
                saveCart();
            }
        }
    }
    ///muestrajsoncart()
    $(location).attr('href','pedido.html');

	///////////////
});
})(jQuery);

   function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


