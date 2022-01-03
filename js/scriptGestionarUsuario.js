$('#editar').hide();
ExtraerUsuarios();
function guardarUsuario() {
    var idGuardarUsuarioM = $('#idOcultoModificar').val();
    var nombreM = $('#nombre').val();
    var dniModificar = $('#dni').val();
    var rolM = $('#rol').val();
    var userM = $('#user').val();
    var contraM = $('#contra').val();
    console.log(idGuardarUsuarioM);
    console.log(nombreM);
    console.log(dniModificar);
    console.log(rolM);
    console.log(userM);
    console.log(contraM);
    //var pesM = $('#pes').val();
    //var resM = $('#res').val();
    
    $.post("../moduloGestion/getGestion.php", { idGuardarUsuarioM: idGuardarUsuarioM, nombreM: nombreM, dniModificar: dniModificar, rolM: rolM, userM: userM, contraM: contraM}, function (data) {
        if (data == "Hay valores NO Validos") {
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
            $('#nombre').val("");
            $('#dni').val("");
            $('#user').val("");
            $('#contra').val("");
            
            //$('#pes').val("");
            //$('#res').val("");
            ExtraerUsuarios();
        }
    });
}
function ExtraerUsuarios() {
    var ExtraerUsuarios = 1;
    $.post("../moduloGestion/getGestion.php", { ExtraerUsuarios: ExtraerUsuarios }, function (data) {
        var ListaUsuarios = JSON.parse(data);
        var resultado = "";
        for (var i = 0; i < ListaUsuarios.length; i++) {
            resultado +=
            "<tr><td>" + ListaUsuarios[i].idUsuario +
            "</td><td>" + ListaUsuarios[i].nombre +
            "</td><td>" + ListaUsuarios[i].dni +
            "</td><td>" + ListaUsuarios[i].rol +
            "</td><td>" + ListaUsuarios[i].login +
            "</td><td>" + ListaUsuarios[i].password +
            
            "</td><td><button class='btn btn-warning' onclick='editarUsuario(" + ListaUsuarios[i].idUsuario + ")'><i class='far fa-edit'></i></button>"+
            "</td><td><button class='btn btn-danger' onclick='eliminarUsuario(" + ListaUsuarios[i].idUsuario + ")'><i class='far fa-trash-alt'></i></button></td></tr>";

        }
        document.getElementById("lista_usuarios").innerHTML = resultado;
    });
}

//
function BuscarUsuarioLogin() {
    var buscar = $('#buscar').val();
    $.post("../moduloGestion/getGestion.php", { buscar: buscar }, function (data) {
        var ListaUsuarios = JSON.parse(data);
        var resultado = "";
        for (var i = 0; i < ListaUsuarios.length; i++) {
            resultado +=
            "<tr><td>" + ListaUsuarios[i].idUsuario +
            "</td><td>" + ListaUsuarios[i].nombre +
            "</td><td>" + ListaUsuarios[i].dni +
            
            "</td><td>" + ListaUsuarios[i].login +
            "</td><td>" + ListaUsuarios[i].password +
            
            "</td><td>" + "</td><td>" + ListaUsuarios[i].rol + "</td><td><button class='btn btn-warning' onclick='editarUsuario(" + ListaUsuarios[i].idUsuario + ")'><i class='far fa-edit'></i></button></td><td><button class='btn btn-danger' onclick='eliminarUsuario(" + ListaUsuarios[i].idUsuario + ")'><i class='far fa-trash-alt'></i></button></td></tr>";

        }
        document.getElementById("lista_usuarios").innerHTML = resultado;

    });
}
function editarUsuario(id) {
    var idEditar = id;
    $('#idOcultoModificar').val("");
    $('#registrar').hide();
    $('#editar').show();
    $.post("../moduloGestion/getGestion.php", { idEditar: idEditar }, function (data) {
        var UsuarioEncontrado = JSON.parse(data);
        console.log(UsuarioEncontrado.idUsuario);
        $('#idOcultoModificar').val(UsuarioEncontrado.idUsuario);
        $('#nombre').val(UsuarioEncontrado.nombre);
        $('#dni').val(UsuarioEncontrado.dni);
        $('#user').val(UsuarioEncontrado.login);
        $('#contra').val(UsuarioEncontrado.password);
       
       // $('#pes').val(UsuarioEncontrado.preguntaS);
       // $('#res').val(UsuarioEncontrado.respuestaS);
        document.getElementById("rol").value = UsuarioEncontrado.rol;

    });
}
function eliminarUsuario(id) {
    var idEliminar = id;
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
            $.post("getGestion.php", { idEliminar: idEliminar }, function (data) {
                ExtraerUsuarios();
            });
        }
    })

}
function registrarUsuario() {
    var nombre = $('#nombre').val();
    var dniRegistro = $('#dni').val();
    var rol = $('#rol').val();
    var user = $('#user').val();
    var contra = $('#contra').val();
    
   // var pes = $('#pes').val();
   // var res = $('#res').val();
    
    $.post("../moduloGestion/getGestion.php", { nombre: nombre, dniRegistro: dniRegistro, rol: rol, user: user, contra: contra  }, function (data) {
        if (data == "Hay valores NO Validos") {
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
                title: 'Registro realizado con exito',
                showConfirmButton: false,
                timer: 1500
            })
            $('#nombre').val("");
            $('#dni').val("");
            $('#user').val("");
            $('#contra').val("");
            
           // $('#pes').val("");
           // $('#res').val("");
            ExtraerUsuarios();
        }
    });
}
