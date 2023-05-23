
const ocultaRegistro = (id) =>{
    $(`#${id}`).addClass('d-none')
}
const muestraRegistro = (id) =>{
    $(`#${id}`).removeClass('d-none')
}



$(function (){
    $('#btn_crearCuenta').on("click", function(){
        ocultaRegistro('seccion_login')
        muestraRegistro('seccion_registro')
    });

    $('#btn_login').on("click", function(){
        ocultaRegistro('seccion_registro')
        muestraRegistro('seccion_login')
    });

});

