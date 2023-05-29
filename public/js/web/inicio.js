
function editar(id){
    fetch(`/obtenerDatos/${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(datos => {
        $('#nombre_estudiante_act').val(datos.nombre_estudiante);
        $('#apellidoPaterno_estudiante_act').val(datos.apellidoPaterno_estudiante);
        $('#apellidoMaterno_estudiante_act').val(datos.apellidoMaterno_estudiante);
        $('#numero_control_act').val(datos.numero_control);
        $('#telefono_celular_act').val(datos.telefono_celular);
        $('#carrera_act').val(datos.carrera);
        $('#fecha_nacimiento_act').val(datos.fecha_nacimiento);
        $('#escuela_procedencia_act').val(datos.escuela_procedencia);
        $('#fecha_registro_act').val(datos.fecha_registro);
        $('#id_estudiante').val(datos.id_estudiante)
        
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function eliminar(id){
    fetch(`/obtenerDatos/${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(datos => {
        console.log(datos);
        $('#llenar_nombre').val(`${datos.nombre_estudiante} ${datos.apellidoPaterno_estudiante} ${datos.apellidoMaterno_estudiante}`)
        $('#llenar_numCtrl').val(datos.numero_control);
        $('#llenar_carrera').val(datos.carrera);
        $('#id_estudiante_eliminar').val(datos.id_estudiante)


    })
    .catch(error => {
        console.error('Error:', error);
    });
}

$(function () {

    $('#tabla_usuarios').DataTable();

    $('#btn_muestra_tabla').on("click", function(){
        ocultar('seccion_usuarios_tarjetas');
        ocultar('btn_muestra_tabla');
        mostrar('seccion_usuario_tabla');
        mostrar('btn_muestra_tarjetas')
    });

    $('#btn_muestra_tarjetas').on("click", function(){
        mostrar('seccion_usuarios_tarjetas');
        mostrar('btn_muestra_tabla');
        ocultar('seccion_usuario_tabla');
        ocultar('btn_muestra_tarjetas')
    });




        
    
});