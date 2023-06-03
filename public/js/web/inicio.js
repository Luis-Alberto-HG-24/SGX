function editar(id) {
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

function eliminar(id) {
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

$(function() {

    $('#tabla_usuarios').DataTable();

    $('#btn_muestra_tabla').on("click", function() {
        ocultar('seccion_usuarios_tarjetas');
        ocultar('btn_muestra_tabla');
        mostrar('seccion_usuario_tabla');
        mostrar('btn_muestra_tarjetas')
    });

    $('#btn_muestra_tarjetas').on("click", function() {
        mostrar('seccion_usuarios_tarjetas');
        mostrar('btn_muestra_tabla');
        ocultar('seccion_usuario_tabla');
        ocultar('btn_muestra_tarjetas')
    });

    // Capturar el evento de cambio en el campo de selección
    document.getElementById('carrera').addEventListener('change', function() {
        // Obtener el valor seleccionado de la carrera
        var carrera = this.value;

        // Obtener el campo de entrada de abreviatura
        var abreviaturaInput = document.getElementById('abreviatura_carrera');

        // Actualizar el valor del campo de entrada de abreviatura
        if (carrera === 'Ingeniería en Sistemas Computacionales') {
            abreviaturaInput.value = 'SIS';
        } else if (carrera === 'Ingeniería en Gestión Empresarial') {
            abreviaturaInput.value = 'GEM';
        } else if (carrera === 'Ingeniería Industrial') {
            abreviaturaInput.value = 'IND';
        } else {
            abreviaturaInput.value = '';
        }
    });

    // Validacion de las fechas
    // Obtener la referencia al campo de fecha
    const fechaNacimientoInput = document.getElementById('fecha_nacimiento');
    const fechaActual1 = new Date();
    const fechaMinima1 = new Date('1900-01-01');
    const fechaMaxima1 = fechaActual1.toISOString().split('T')[0];
    fechaNacimientoInput.setAttribute('min', fechaMinima1.toISOString().split('T')[0]);
    fechaNacimientoInput.setAttribute('max', fechaMaxima1);

    // Obtener la referencia al campo de fecha
    const fechaRegistroInput = document.getElementById('fecha_registro');
    const fechaActual2 = new Date();
    const fechaMinima2 = new Date('1900-01-01');
    const fechaMaxima2 = fechaActual2.toISOString().split('T')[0];
    fechaRegistroInput.setAttribute('min', fechaMinima2.toISOString().split('T')[0]);
    fechaRegistroInput.setAttribute('max', fechaMaxima2);
});