$(document).ready(function() {
    $('#modalActualizar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botón que disparó el evento

        // Obtener la fila del registro seleccionado
        var row = button.closest('tr');

        // Obtener los valores de los campos existentes en la fila
        var nombreEstudiante = row.find('td:nth-child(1)').text();
        var apellidoPaterno = row.find('td:nth-child(2)').text();
        var apellidoMaterno = row.find('td:nth-child(3)').text();
        var numeroControl = row.find('td:nth-child(4)').text();
        var telefonoCelular = row.find('td:nth-child(5)').text();
        var carrera = row.find('td:nth-child(6)').text();
        var fechaNacimiento = row.find('td:nth-child(7)').text();
        var escuelaProcedencia = row.find('td:nth-child(8)').text();
        var fechaRegistro = row.find('td:nth-child(9)').text();

        // Actualizar los valores de los campos en el formulario de la modal
        $('#modalActualizar #nombre_estudiante').val(nombreEstudiante);
        $('#modalActualizar #apellidoPaterno_estudiante').val(apellidoPaterno);
        $('#modalActualizar #apellidoMaterno_estudiante').val(apellidoMaterno);
        $('#modalActualizar #numero_control').val(numeroControl);
        $('#modalActualizar #telefono_celular').val(telefonoCelular);
        $('#modalActualizar #carrera').val(carrera);
        $('#modalActualizar #fecha_nacimiento').val(fechaNacimiento);
        $('#modalActualizar #escuela_procedencia').val(escuelaProcedencia);
        $('#modalActualizar #fecha_registro').val(fechaRegistro);

        // Actualizar la acción del formulario con la URL correcta
        var form = $('#modalActualizar form');
        var updateUrl = form.attr('action').replace(':id_estudiante', button.data('id-estudiante'));
        form.attr('action', updateUrl);
    });
});

$(document).ready(function() {
    $('#modalEliminar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botón que disparó el evento

        var form = $(this).find('form');
        var action = button.data('action'); // Obtener la URL de eliminación del registro

        // Actualizar el atributo "action" del formulario con la URL correcta de eliminación
        form.attr('action', action);
    });

    $('#modalEliminar').on('hidden.bs.modal', function() {
        var form = $(this).find('form');
        form.attr('action', ''); // Restablecer el atributo "action" del formulario
    });
});