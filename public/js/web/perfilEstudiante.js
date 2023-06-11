
function vistaPrevia(id,credito){
    let evidencia = ``;
    fetch(`/vistaPrevia/${id}/${credito}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.extension == 'jpg' || data.extension == 'jpeg' || data.extension == 'png') {

            evidencia = `<img class="img-evidencia" src="${data.ruta}" alt="">`

        } else if(data.extension == 'pdf'){

            evidencia = `<iframe style="width:100%; height:700px;" src="${data.ruta}" frameborder="0"></iframe>`
        }

        $('#seccion_vistaPrevia').html(evidencia)
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function elimiarMooc(tipo,id){
    fetch(`/obtenerMooc/${tipo}/${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(datos => {
        $('#nombre_mooc').val(datos[0].nombre);
        $('#id_mooc_eliminar').val(datos[0].id_mooc);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function agregarMooc(tipo,id_estudiante){
    let tabla = ``;
    let mensaje = ``;
    let botones = ``;
    $('#tipo_mooc').val(tipo)
    fetch(`/obtenerMooc/${tipo}/${id_estudiante}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(datos => {
        if (Object.keys(datos).length == 0) {
            mensaje = ` <div class="col text-center">
                            <div class="fs-3 text-muted fw-light">Aun no se ha agregado ningún Mooc</div>
                        </div>`;
            botones = ` <input type="number" name="id_estudiante" value="${id_estudiante}" hidden>
                        <input type="text" name="tipo_mooc" value="${tipo}" hidden>
                        <div class="file-select" id="btn_mooc">
                            <input type="file"  name="btn_mooc" aria-label="Archivo" accept="image/.jpg, .jpeg, .png ,/document/.doc,.docx,.pdf">
                        </div>
                        <button class="btn btn-login mt-1 ms-1">Aceptar</button>
                    `;
            $('#seccion_info').html(mensaje);
            $('#seccion_botones').html(botones);

                
        } else {
            console.log(datos);
            tabla = `<table class="table text-center">
                        <thead>
                            <tr>
                                <th class="fw-light">Evidencia</th>
                                <th class="fw-light">Ver</th>
                                <th class="fw-light">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${datos[0].nombre}</td>
                                <td><button type="button" class="btn btn-warning"><i class="fa-solid fa-eye"></i></button></td>
                                <td><button onclick="elimiarMooc('${tipo}',${id_estudiante})" data-bs-toggle="modal" data-bs-target="#modalEliminarMooc" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                            </tr>
                        </tbody>
                    </table>`;
            $('#seccion_info').html(tabla);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function eliminarEvento(tipo,id_evento){
    let tabla = ``;
    fetch(`/obtenerEvento/${id_evento}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(datos => {
         tabla = `<table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Nombre del evento</th>
                        <th class="text-center">Horas</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Ver evidencia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>${datos[0].nombre_evento}</td>
                        <td>${datos[0].horas}</td>
                        <td>${datos[0].fecha_evento}</td>
                        <td><button type="button" class="btn btn-warning"><i class="fa-solid fa-eye"></i></button></td>
                    </tr>
                </tbody>
            </table>`;

        $('#seccion_eliminar_evento').html(tabla);
        $('#tipo_credito_eliminar').val(tipo)
        $('#id_evento_eliminar').val(datos[0].id_evento)
        $('#id_evidencia_eliminar').val(datos[0].id_evidencia)
    })
    .catch(error => {
        console.error('Error:', error);
    });

    
}

function agregarEvidencia(tipo,id_estudiante){
    console.log(tipo);
    $('#tipo_credito_evento').val(tipo)

    fetch(`/obtenerEvidencia/${tipo}/${id_estudiante}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(datos => {
        console.log(datos);
        let info = ``;
        let tabla = ``;
        if (datos == "") {
            info = `<div class="text-center fs-3 text-muted fw-light">Aun no has agregado ninguna evidencia al Credito </div>`;
            $('#seccion_info_evidencia').html(info)

        } else {
            datos.map(dato =>{
                tabla += `
                        <tr class="text-center fw-light text-muted" >
                            <td>${dato.nombre_evento}</td>
                            <td>${dato.horas}</td>
                            <td>${dato.fecha_evento}</td>
                            <td><a href="/pdf_constancia/${dato.id_estudiante_fk}/${dato.id_evento}" class="btn btn-success"><i class="fa-regular fa-file-lines"></i></a></td>
                            <td><button onclick="vistaPrevia(${dato.id_evidencia},'${dato.credito}')" data-bs-toggle="modal" data-bs-target="#modalVistaPrevia" type="button" class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></td>
                            <td><button data-bs-toggle="modal" data-bs-target="#modalEditarEvento" onclick="editarEvento(${dato.id_evento})" type="button" class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></td>
                            <td><button data-bs-toggle="modal" data-bs-target="#modalEliminarEvento" onclick="eliminarEvento('${tipo}',${dato.id_evento})" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                        `;
                info = `<table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th class="fw-light">Nombre del evento</th>
                                    <th class="fw-light">Horas</th>
                                    <th class="fw-light">fecha</th>
                                    <th class="fw-light">Generar acuse</th>
                                    <th class="fw-light">Ver evidencia</th>
                                    <th class="fw-light">Editar</th>
                                    <th class="fw-light">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="datos_tabla">
                            </tbody>
                        </table>`
                ;
                $('#seccion_info_evidencia').html(info)
                $('#datos_tabla').html(tabla)

            })
            
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });



}

function editarEvento(id){
    fetch(`/obtenerEvento/${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(datos => {
        console.log(datos);
        $('#nombre_evento_act').val(datos[0].nombre_evento);
        $('#horas_act').val(datos[0].horas);
        $('#fecha_evento_act').val(datos[0].fecha_evento);
        $('#id_evento_act').val(datos[0].id_evento);
        $('#id_evidencia_act').val(datos[0].id_evidencia);
        $('#credito_act_evento').val(datos[0].credito);

    })
    .catch(error => {
        console.error('Error:', error);
    });
}

$(function (){

    $('#btn_act_siguiente').on("click", function(){
        ocultar('act_pt1');
        mostrar('act_pt2');
    })

    $('#btn_act_regresar').on("click", function(){
        mostrar('act_pt1');
        ocultar('act_pt2');
    })

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
})
