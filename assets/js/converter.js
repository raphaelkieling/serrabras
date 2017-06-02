function converteSemanaBloqueada(semana){
    var semana = semana.split(',');
    console.log("Encontrar e liberar: "+semana);
    var semana_dias  = [0,1,2,3,4,5,6];
    var semana_final = "";
    var encontrou    = false;

    console.log("NÃO Achados ----------------");
    for(var i = 0; i < semana_dias.length ;i++){
        for(var j = 1; j < semana.length ;j++){
            if(semana_dias[i] == semana[j]){
                encontrou = true;
            }
        }
        if(!encontrou){
            semana_final = semana_final+","+semana_dias[i];
            console.log(semana_dias[i] + " <<");
        }
        encontrou = false;
    }
    console.log("BLOQUEADOS: " +semana_final);
    return semana_final;
}
function convertHoraParaEsconder(hora){
    var horario = hora;
    var resultado = horario.split(':');
    return resultado[0]+"-"+resultado[1];
}
function convertData(data){
    var calendario = data.split('/');
    return calendario[0]+"-"+calendario[1]+"-"+calendario[2];
}
function convertDataMysql(data){
     return calendario = data.split('-');
}

function retornaSemZero(data){
    var dia = data.substring(1,0);
    if(dia === "0"){
        var dia = data.substring(1,2);
        return dia; 
    }else{
        return data;
    }
}
function converteDias(data){
    libera_dia =[];
    bloquear_dia = [];
    for(var i=0;i<data.length;i++){
        console.log('CONVERTENDO ------------------------');
        var data_gerenciadora  = convertDataMysql(data[i]['data']);
        var data_dia           = retornaSemZero(data_gerenciadora[2]);
        var data_mes           = retornaSemZero(data_gerenciadora[1]);
        var data_ano           = data_gerenciadora[0];    

        var data_resultado = data_ano+"-"+data_mes+"-"+data_dia;
        console.log("resultado da conversão" + data_resultado);

        if(data[i]['tipo']=="liberar"){
            libera_dia.push(new Date(data_ano,data_mes,data_dia));
            console.log('CONVERTENDO ------------------------');

        }else{
            bloquear_dia.push(new Date(data_ano,data_mes,data_dia));
            console.log('CONVERTENDO ------------------------');
        }
    }
}

function adicionaDuasHoras(){
    $('.hora_view').each(function(index){
        console.log($(this).text());

        var hora_convertida = $(this).text().substring(5,0)+":00";
        var hora_inicio_m = moment(hora_convertida,'hmmss').format('HH:mm');
        var hora_final_m = moment(hora_convertida,'hmmss').add(2,'hours').format('HH:mm');

        $(this).html(hora_inicio_m + " - ");
        $(this).append(hora_final_m);
    })
}