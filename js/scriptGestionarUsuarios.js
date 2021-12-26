ExtraerUsuarios();
$('.btnOculto').hide();
var ListaUsuarios = new Array();

function editarUsuario(id_editar) {
    $('.btnmostrar').hide();
    $('.btnOculto').show();
    $('#idmoficar').val("");
    $.post("../moduloGestion/getUsuarios.php", { id_editar: id_editar }, function (data) {
        var UsuarioEncontrado = JSON.parse(data);
        $('#idmoficar').val(UsuarioEncontrado.id);
        $('#nUsuario').val(UsuarioEncontrado.producto);
       // $('#DNI').val(UsuarioEncontrado.precioU);
       // $('#Estado').val(UsuarioEncontrado.stock);        
    });
}

function modificausuario() {
    var formData = new FormData();
    var idmoficar = $('#idmoficar').val();
    var UsuarioEdi = $('#nUsuario').val();
   // var PrecioEdi = $('#pUnitario').val();
  //  var StockEdi = $('#stock').val();    
  //  var ImagenEdi = $('#imagen')[0].files[0];

    formData.append('idmoficar',idmoficar);
    formData.append('UsuarioEdi',UsuarioEdi);
    //formData.append('PrecioEdi',PrecioEdi);
    //formData.append('StockEdi',StockEdi);    
    //formData.append('ImagenEdi',ImagenEdi);
    


    $.ajax({
        url: 'getUsuario.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {

            if (data != "1") {
                Swal.fire({
                    title: data,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            }
            else {
                Swal.fire({
                    icon: 'success',
                    title: 'Modificado exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#idmoficar').val("");
                $('#nUsuario').val("");
              //  $('#pUnitario').val("");
              //  $('#stock').val("");
              //  $('#imagen').val("");
                $('.btnOculto').hide();
                $('.btnmostrar').show();
                ExtraerUsuarios();
            }
        }
    });
}
function eliminarUsuario(idUsuario) {
    Swal.fire({
        title: '¿Estas seguro de Eliminar Usuario?',
        text: "¡Recuerda que esto ya no se podrá revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡ Sí, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                '¡Eliminado!',
                'El Usuario ha sido Eliminado.',
                'success'
            )
            $.post("../moduloGestion/getUsuarios.php", { idUsuario: idUsuario }, function (data) {
                ExtraerUsuarios();
            });
        }
    })

}

function Buscarusuario() {
    var BUsuario = $('#BUsuario').val();
    $.post("../moduloGestion/getUsuarios.php", { BUsuario: BUsuario }, function (data) {
        var ListaUsuarios = JSON.parse(data);
        var resultado = "";
        for (var i = 0; i < ListaUsuarios.length; i++) {
            resultado+="<tr><td>"+ListaUsuarios[i].usuario+"</td><td>"+ListaProductos[i].vhj+"</td><td>"+ListaProductos[i].jh+"<td><button class='btn btn-warning' onclick='editarProducto("+ListaProductos[i].id+")'><i class='far fa-edit'></i></button></td><td><button class='btn btn-danger' onclick='eliminarProducto("+ListaProductos[i].id+")'><i class='far fa-trash-alt'></i></button></td></tr>";
        }
        document.getElementById("lista_usuarios").innerHTML = resultado;
    });
}
function guardausuario() {

    var formData = new FormData();
    var NUsuario = $('#nUsuario').val();
    //var PrecioU = $('#pUnitario').val();
    //var StockP = $('#stock').val();    
    //var ImagenP = $('#imagen')[0].files[0];

    formData.append('NUsuario',NProducto);
    //formData.append('PrecioU',PrecioU);
    //formData.append('StockP',StockP);    
    //formData.append('ImagenP',ImagenP);

    $.ajax({
        url: 'getUsuarios.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {

            if (data != "1") {
                Swal.fire({
                    title: data,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            }
            else {
                Swal.fire({
                    icon: 'success',
                    title: 'Añadido exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#nUsuarios').val("");
                //$('#pUnitario').val("");
                //$('#stock').val("");
                //$('#imagen').val("");
                ExtraerUsuarios();
            }
        }
    });
}
function ExtraerUsuarios() {
    var extraerUsuarios = 1;
    $.post("../moduloGestion/getUsuarios.php", { extraerUsuarios: extraerUsuarios }, function (data) {
        var ListaUsuarios = JSON.parse(data);
        var resultado = "";        
        for (var i = 0; i < ListaUsuarios.length; i++) {
            
            //
            resultado+="<tr><td>"+ListaUsuarios[i].usuario+"</td><td>"+ListaUsuarios[i].estado+"</td><td>"+ListaUsuarios[i].dni+"<td><button class='btn btn-warning' onclick='editarUsuario("+ListaUsuarios[i].id+")'><i class='far fa-edit'></i></button></td><td><button class='btn btn-danger' onclick='eliminarUsuario("+ListaUsuarios[i].id+")'><i class='far fa-trash-alt'></i></button></td></tr>";
            //
        }
        document.getElementById("lista_productos").innerHTML = resultado;
    });
}