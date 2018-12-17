
function calcularEnergia(){

    var energia_trabajo
    var energia_preñez

    var estado_preñez = $('input[name="estado_preñez"]:checked').val();
    var peso_vivo = document.getElementById("peso_vivo").value
    var horas_trabajo_dia = document.getElementById("horas_trabajo_dia").value
    var contenido_graso = document.getElementById("contenido_graso").value
    var leche_producida = document.getElementById("leche_producida").value
    var porcentaje_digestibilidad = document.getElementById("porcentaje_digestibilidad").value
    var coeficiente_mantenimiento = document.getElementById("coeficiente_mantenimiento").value
    var coeficiente_actividad = document.getElementById("coeficiente_actividad").value
    var coeficiente_preñez = document.getElementById("coeficiente_preñez").value

    var energia_mantenimiento = coeficiente_mantenimiento*(Math.pow(peso_vivo, 0.75))
    var energia_actividad = coeficiente_actividad*energia_mantenimiento
    var energia_lactancia = leche_producida*(1.47+0.4*contenido_graso)

    if(horas_trabajo_dia==0 || horas_trabajo_dia==null){
        energia_trabajo = 0
    }else{
        energia_trabajo = 10 //Aquí va la fórmula
    }
    debugger
    if (estado_preñez=="") {
        energia_preñez = 0
    }else{
        energia_preñez = 15
    }

    //REM: 1123-(4092*10^-3*%DE)+(1126*10^-5*(%DE^2))-(25.4/%DE)  -> valor calculado pero no visible
    //energia bruta: (suma de las demás energias)/(%DE/100) -> valor calculado pero no visible
    var cmst = (((5.4*peso_vivo)/500)/((100-porcentaje_digestibilidad)/100));

    document.getElementById("energia_neta_mantenimiento").value = energia_mantenimiento
    document.getElementById("energia_neta_actividad").value = energia_actividad
    document.getElementById("energia_neta_lactancia").value = energia_lactancia
    document.getElementById("energia_neta_trabajo").value = energia_trabajo
    document.getElementById("energia_neta_preñez").value = energia_preñez
    document.getElementById("cmst").value = cmst

}

function mostrarEnergias(enm, ena, enl, ent, enp){
    document.getElementById("energia_mantenimiento").innerHTML = enm
    document.getElementById("energia_actividad").innerHTML = ena
    document.getElementById("energia_lactancia").innerHTML = enl
    document.getElementById("energia_trabajo").innerHTML = ent
    document.getElementById("energia_preñez").innerHTML = enp
}

function mostrarFiltro(registros){
    document.getElementById("cantidadRegistros").value = cantidadRegistros
}

