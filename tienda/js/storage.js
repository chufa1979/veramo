        var cart = [];
        $(function () {
            if (localStorage.cart)
            {
                cart = JSON.parse(localStorage.cart);
            }
        });

        function saveCart() {
            if (window.localStorage)
            {
                localStorage.cart = JSON.stringify(cart);
            }
        }

        function muestrajsoncart() {
            console.log(localStorage.cart);
        }

        function eliminarcarro() {
            localStorage.clear();
        }

        function eliminaunosolo() {
            localStorage.clear();
        }


        function showCart() {
            var linea = '';
            if (cart.length == 0) {
                linea = '<div class="listado_misdatos">'+
                        '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">' +
                        '<tr>' +
                        '<td height="200" align="center" valign="middle">No hay productos en el carrito</td>' +
                        '</tr>' +
                        '</table>' +
                        '</div>';
            } else {

                $("#cartBody").empty();
                var linea = '';
                var total = 0;
                for (var i in cart) {
                    var item = cart[i];
                    
                    linea += '<form id="form1" name="form1" method="get" action="pedir.html">' +
                                '<div class="pedido_listado">'+
                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                '<tr>' +
                                '<td width="55" height="70" align="left" valign="top">' +
                                '<img src="'+item.Imagenp+'" alt="'+item.Titulo+'" /></td>' +
                                '<td align="left" valign="top" class="prod">' +
                                '<strong>'+item.Titulo+'</strong><br />'+
                                'Art: '+item.Articulo+'<br />'+
                                'Color: '+item.Color +
                                '</td></tr>'+
                                '<tr><td colspan="2" align="left" valign="top">' +
                                '<div class="pedido_top">' +
                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                '<tr>' +
                                '<td width="45" align="left">Talle</td>' +
                                '<td width="90" align="left">Cant</td>' +
                                '<td align="right">P. Unitario</td>' +
                                '<td width="70" align="right">SubTotal</td>' +
                                '<td width="40" align="center">Quitar</td>' +
                                '</tr></table></div>';  
                                                          
                                if (item.Talle_s!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M1+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_m"></label>' +
                                                '<input name="talle_s" type="text" class="pedido_cant" id="talle_s" value="'+item.Talle_s+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_s)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=1"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_s);
                                }
                                if (item.Talle_m!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M2+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_m"></label>' +
                                                '<input name="talle_m" type="text" class="pedido_cant" id="talle_m" value="'+item.Talle_m+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_m)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=2"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_m);
                                }
                                if (item.Talle_l!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M3+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_l" type="text" class="pedido_cant" id="talle_l" value="'+item.Talle_l+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_l)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=3"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_l);
                                }
                                if (item.Talle_xl!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M4+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_xl" type="text" class="pedido_cant" id="talle_xl" value="'+item.Talle_xl+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_xl)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=4"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_xl);
                                }
                                if (item.Talle_xxl!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M5+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_xxl" type="text" class="pedido_cant" id="talle_xxl" value="'+item.Talle_xxl+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_xxl)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=5"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_xxl);
                                }
                                if (item.Talle_xxxl!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M6+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_xxxl" type="text" class="pedido_cant" id="talle_xxxl" value="'+item.Talle_xxxl+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_xxxl)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=6"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_xxxl);
                                }
                                if (item.Talle_xxxxl!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M7+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_xxxxl" type="text" class="pedido_cant" id="talle_xxxxl" value="'+item.Talle_xxxxl+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_xxxxl)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=7"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_xxxxl);
                                }
                                if (item.Talle_1!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M8+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_1" type="text" class="pedido_cant" id="talle_1" value="'+item.Talle_1+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_1)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=8"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_1);
                                }
                                if (item.Talle_2!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M9+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_2" type="text" class="pedido_cant" id="talle_2" value="'+item.Talle_2+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_2)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=9"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_2);
                                }
                                if (item.Talle_3!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M10+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_3" type="text" class="pedido_cant" id="talle_3" value="'+item.Talle_3+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_3)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=10"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_3);
                                }
                                if (item.Talle_4!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M11+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_4" type="text" class="pedido_cant" id="talle_4" value="'+item.Talle_4+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_4)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=11"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_4);
                                }
                                if (item.Talle_5!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M12+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_5" type="text" class="pedido_cant" id="talle_5" value="'+item.Talle_5+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_5)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=12"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_5);
                                }
                                if (item.Talle_6!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M13+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                '<input name="talle_6" type="text" class="pedido_cant" id="talle_6" value="'+item.Talle_6+'" /></td>' +
                                                '<td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_6)+'</td>' +
                                                '<td width="40" align="center"><a href="pedir.html?eliminar='+item.Titulo+'&tama=13"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_6);
                                }

                                linea += '</td>' +
                                         '</tr>' +
                                         '</table>' +
                                         '<input name="vid" type="hidden" id="vid" value="'+item.Vid+'" />' +
                                         '<input name="id" type="hidden" id="id" value="'+item.Vid+'" />' +
                                         '<input name="titulo" type="hidden" id="titulo" value="'+item.Titulo+'" />' +
                                         '<input name="color" type="hidden" id="color" value="'+item.Color+'" />' +
                                         '</div>' +
                                         '<input name="vm1" type="hidden" id="vid" value="'+item.Talle_s+'" />' +
                                         '<input name="vm2" type="hidden" id="vm2" value="'+item.Talle_m+'" />' +
                                         '<input name="vm3" type="hidden" id="vm3" value="'+item.Talle_l+'" />' +
                                         '<input name="vm4" type="hidden" id="vm4" value="'+item.Talle_xl+'" />' +
                                         '<input name="vm5" type="hidden" id="vm5" value="'+item.Talle_xxl+'" />' +
                                         '<input name="vm6" type="hidden" id="vm6" value="'+item.Talle_xxxl+'" />' +
                                         '<input name="vm7" type="hidden" id="vm7" value="'+item.Talle_xxxxl+'" />' +
                                         '<input name="vm8" type="hidden" id="vm8" value="'+item.Talle_1+'" />' +
                                         '<input name="vm9" type="hidden" id="vm9" value="'+item.Talle_2+'" />' +
                                         '<input name="vm10" type="hidden" id="vm10" value="'+item.Talle_3+'" />' +
                                         '<input name="vm11" type="hidden" id="vm11" value="'+item.Talle_4+'" />' +
                                         '<input name="vm12" type="hidden" id="vm12" value="'+item.Talle_5+'" />' +
                                         '<input name="vm13" type="hidden" id="vm13" value="'+item.Talle_6+'" />' +
                                         '<input name="vid" type="hidden" id="vid" value="'+item.Id+'" />' +
                                         '<input name="id" type="hidden" id="id" value="'+item.Id+'" />' +
                                         '<input name="articulo" type="hidden" id="articulo" value="'+item.Articulo+'" />' +
                                         '<input name="titulo" type="hidden" id="titulo" value="'+item.Titulo+'" />' +
                                         '<input name="precio1" type="hidden" id="precio1" value="'+item.Precio1+'" />' +
                                         '<input name="precio2" type="hidden" id="precio2" value="'+item.Precio2+'" />' +
                                         '<input name="imagenp" type="hidden" id="imagenp" value="'+item.Imagenp+'" />' +
                                         '</form>';
                                        }
                                linea +=                                         
                                         '<div class="pedido_total">' +
                                         '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                         '<tr>' +
                                         '<td align="left">&nbsp;</td>' +
                                         '<td width="100" align="right">TOTAL</td>' +
                                         '<td width="130" align="right">$ ' + total + '</td>' +
                                         '<td width="50" align="center">&nbsp;</td>' +
                                         '</tr>' +
                                         '</table>' +
                                         '</div>' +
                                         '<div class="pedido_botones">' +
                                         '<input name="button2" type="button" class="seguir_pedido" id="button2" onclick="MM_goToURL("parent","home.index.html");return document.MM_returnValue" value="SEGUIR COMPRANDO" />' +
                                         '</br>&nbsp;&nbsp;</br>' +
                                         '<input name="button" type="submit" class="finalizar_pedido" id="button" onclick="MM_goToURL("parent","pedido_confirmar.html");return document.MM_returnValue" value="FINALIZAR PEDIDO" />' +
                                         '</div>'; 
                
            }
            //total
            $("#cartBody").append(linea);
        }


        function showCartEnvio() {
            var linea = '';
            if (cart.length == 0) {
                linea = '<div class="listado_misdatos">'+
                        '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">' +
                        '<tr>' +
                        '<td height="200" align="center" valign="middle">No hay productos en el carrito</td>' +
                        '</tr>' +
                        '</table>' +
                        '</div>';
            } else {

                $("#cartBody").empty();
                var linea = '';
                var total = 0;
                for (var i in cart) {
                    var item = cart[i];
                    
                    linea += '<form id="form1" name="form1" method="post" action="pedir.html">' +
                                '<div class="pedido_listado">'+
                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                '<tr>' +
                                '<td width="55" height="70" align="left" valign="top">' +
                                '<img src="'+item.Imagenp+'" alt="'+item.Titulo+'" /></td>' +
                                '<td align="left" valign="top" class="prod">' +
                                '<strong>'+item.Titulo+'</strong><br />'+
                                'Art: '+item.Articulo+'<br />'+
                                'Color: '+item.Color +
                                '</td></tr>'+
                                '<tr><td colspan="2" align="left" valign="top">' +
                                '<div class="pedido_top">' +
                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                '<tr>' +
                                '<td width="45" align="left">Talle</td>' +
                                '<td width="90" align="left">Cant</td>' +
                                '<td align="right">P. Unitario</td>' +
                                '<td width="70" align="right">SubTotal</td>' +
                                '<td width="40" align="center"></td>' +
                                '</tr></table></div>';  
                                                          
                                if (item.Talle_s!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M1+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_m"></label>' +
                                                ''+item.Talle_s+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_s)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_s);
                                }
                                if (item.Talle_m!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M2+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_m"></label>' +
                                                ''+item.Talle_m+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_m)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_m);
                                }
                                if (item.Talle_l!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M3+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_l+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_l)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_l);
                                }
                                if (item.Talle_xl!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M4+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_xl+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_xl)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_xl);
                                }
                                if (item.Talle_xxl!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M5+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_xxl+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_xxl)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_xxl);
                                }
                                if (item.Talle_xxxl!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M6+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_xxxl+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_xxxl)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_xxxl);
                                }
                                if (item.Talle_xxxxl!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M7+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_xxxl+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio1+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio1*item.Talle_xxxxl)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio1*item.Talle_xxxxl);
                                }
                                if (item.Talle_1!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M8+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_1+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_1)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_1);
                                }
                                if (item.Talle_2!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M9+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_2+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_2)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_2);
                                }
                                if (item.Talle_3!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M10+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_3+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_3)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_3);
                                }
                                if (item.Talle_4!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M11+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_4+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_4)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_4);
                                }
                                if (item.Talle_5!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M12+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_5+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_5)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_5);
                                }
                                if (item.Talle_6!=0) {
                                    linea +=    '<div class="pedido_listadotalle">'+
                                                '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                                '<tr>' +
                                                '<td width="45" align="left">'+item.M13+'</td>' + 
                                                '<td width="45" align="left"><label for="talle_l"></label>' +
                                                ''+item.Talle_6+'</td>' +
                                                '<td width="45" align="left"></td>' +
                                                '<td align="right">$'+item.Precio2+'</td>' +
                                                '<td width="70" align="right">$'+(item.Precio2*item.Talle_6)+'</td>' +
                                                '<td width="40" align="center"></td>' +
                                                '</tr>' +
                                                '</table>' +
                                                '</div>';
                                    total += (item.Precio2*item.Talle_6);
                                }

                                linea += '</td>' +
                                         '</tr>' +
                                         '</table>' +
                                         '<input name="vid" type="hidden" id="vid" value="'+item.Vid+'" />' +
                                         '<input name="id" type="hidden" id="id" value="'+item.Vid+'" />' +
                                         '<input name="titulo" type="hidden" id="titulo" value="'+item.Titulo+'" />' +
                                         '<input name="color" type="hidden" id="color" value="'+item.Color+'" />' +
                                         '</div>' +
                                         '</form>';
                                        }
                                linea +=                                         
                                         '<div class="pedido_total">' +
                                         '<table width="100%" border="0" cellspacing="0" cellpadding="0">' +
                                         '<tr>' +
                                         '<td align="left">&nbsp;</td>' +
                                         '<td width="100" align="right">TOTAL</td>' +
                                         '<td width="130" align="right">$ ' + total + '</td>' +
                                         '<td width="50" align="center">&nbsp;</td>' +
                                         '</tr>' +
                                         '</table>' +
                                         '</div>'; 
                
            }
            //total
            $("#cartBody").append(linea);
        }


        function muestracarromax() {
            var maximo = 0;
            maximo = cart.length;
            return(maximo);
        }

        function muestracarromin() {
            var total = 0;
            var linea = '';
            if (cart.length == 0) {

            } else {
                for (var i in cart) {
                    var item = cart[i];
                    
                                if (item.Talle_s!=0) {
                                    total += (item.Precio1*item.Talle_s);
                                }
                                if (item.Talle_m!=0) {
                                    total += (item.Precio1*item.Talle_m);
                                }
                                if (item.Talle_l!=0) {
                                    total += (item.Precio1*item.Talle_l);
                                }
                                if (item.Talle_xl!=0) {
                                    total += (item.Precio1*item.Talle_xl);
                                }
                                if (item.Talle_xxl!=0) {
                                    total += (item.Precio1*item.Talle_xxl);
                                }
                                if (item.Talle_xxxl!=0) {
                                    total += (item.Precio1*item.Talle_xxxl);
                                }
                                if (item.Talle_xxxxl!=0) {
                                    total += (item.Precio1*item.Talle_xxxxl);
                                }
                                if (item.Talle_1!=0) {
                                    total += (item.Precio2*item.Talle_1);
                                }
                                if (item.Talle_2!=0) {
                                    total += (item.Precio2*item.Talle_2);
                                }
                                if (item.Talle_3!=0) {
                                    total += (item.Precio2*item.Talle_3);
                                }
                                if (item.Talle_4!=0) {
                                    total += (item.Precio2*item.Talle_4);
                                }
                                if (item.Talle_5!=0) {
                                    total += (item.Precio2*item.Talle_5);
                                }
                                if (item.Talle_6!=0) {
                                    total += (item.Precio2*item.Talle_6);
                                }

                }
                
            }
            return total;
        }



        function MM_goToURL() { //v3.0
            var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
            for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
         }
      