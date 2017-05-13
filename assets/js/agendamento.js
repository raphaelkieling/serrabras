var local = $('#local');
var hora_selecionada = "";
var hora_form = $('#hora_form');

formAdd();
pegaMedidas();
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
function carregaCalendario(){
    var semana_funcionando   = local.find(':selected').data("dias");
    var bloquear = converteSemanaBloqueada(semana_funcionando);

    $('#dateval').datepicker("destroy");
    $('#dateval').datepicker({
        startDate: "date",
        language:"pt-BR",
        daysOfWeekDisabled: bloquear,
        todayBtn: true,
        todayHighlight: true,
        calendarWeeks: true,
        autoclose: true,
        datesDisabled:['19/05/2017']
    });
    $('#dateval').datepicker("refresh");

}
function criaHorarios(){
    limpaHorasSelecionadas();
    $('.div-horas').html('');
    var horario_inicial = local.find(':selected').data("init");
    var limite          = local.find(':selected').data("limite");
    console.log("Criando Horários >>>> Horario: "+horario_inicial+" e limite: "+limite);

    var hora_antiga = moment(horario_inicial,'hmmss').format('HH:mm');
    for(var i = 0;i<limite;i++){
        var hora_nova = moment(hora_antiga,'hmmss').add(2,'hours').format('HH:mm');
        var hora_nova_id_esconder = convertHoraParaEsconder(hora_antiga);
        $('.div-horas').append("<div class='hora-aberta botao_hora' id='"+hora_nova_id_esconder+"' data-hora='"+hora_antiga+"'><p class='text-center'>"+hora_antiga+" - "+hora_nova+"</p></div>");
        hora_antiga = hora_nova;
    }

    $('.botao_hora').click(function(){
        limpaHorasSelecionadas();
       $(this).addClass("hora-importante");
       hora_selecionada = $(this).data("hora");
       hora_form.val(hora_selecionada+":00");
       console.log("Hora Selecionada >>>> "+ hora_selecionada);
    }) 

}
function convertHoraParaEsconder(hora){
    var horario = hora;
    var resultado = horario.split(':');
    return resultado[0]+"-"+resultado[1];
}
function limpaHorasSelecionadas(){
    $('.hora-aberta').removeClass("hora-importante");
    hora_selecionada="";
    hora_form.val("");
    console.log(hora_selecionada);
}

//Verifica a data()
function verificaData(){
    console.log('rodou verifica');
    var datepicker = $('#dateval');
    
    data_convertida = convertData(datepicker.val());
    $.ajax({
        url:'agendamento/buscahorario/'+data_convertida+'/'+local.val(),
        success:function(data){
            criaHorarios();
            apagaHorariosUsados(data);
        }
    }); 
}
function apagaHorariosUsados(data){
    for(var i=0;i<data.length;i++){
        var horario = data[i]['hora_entrega'];
        $('#'+convertHoraParaEsconder(horario)).hide();
        console.log("Apaga >> " + convertHoraParaEsconder(horario));
    }
}
function convertData(data){
    var calendario = data.split('/');
    return calendario[0]+"-"+calendario[1]+"-"+calendario[2];
}

function limpaData(){
    $('#dateval').val('');
}



// MEDIDAS ---------------------------------------------------------------------------------------------------

function pegaMedidas(){
    $('.medida-form').html();
    $.ajax({
        url:'agendamento/buscamedidas',
        success:function(data){
            for(var index=0;index<data.length;index++){
                $('.medida-form').append("<option value='"+data[index]['idMedida']+"'>"+data[index]['qualidade']+"-"+data[index]['espessura']+"-"+data[index]['largura']+"-"+data[index]['comprimento']+"</option>");
            }
        }
    })
}

//Coloca o formulário de peças no campo adicionando mais 1
function formAdd(){
    $('tbody').append("<tr>"+
            "<td><input type='number' name='nmr_pacotes[]' class='form-control form-table-input' required></td>"+
            "<td>"+
                "<select name='medida[]' class='form-control form-table-input medida-form' required>"+
                    "<option>Selecione uma</option>"+
                "</select>"+
            "</td>"+
            "<td><input type='number' name='pecas[]' class='form-control form-table-input' required></td>"+
            "<td><a onclick='formAdd();' class='btn btn-default btn-secondary'><span class='glyphicon glyphicon-plus'></span></a></td>"+
        "</tr><tr><td> &nbsp</td></tr>");
    pegaMedidas();
}