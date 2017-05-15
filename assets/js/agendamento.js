var local = $('#local');
var hora_selecionada = "";
var hora_form = $('#hora_form');
var bloquear = "";

var libera_dia   = []; //libera um dia escolhido
var bloquear_dia = []; // idem

formAdd();
pegaMedidas();

function pegaDiasLiberarLocais(){
    $.ajax({
        url:'locais/pegadias/'+local.val(),
        success:function(data){
            converteDias(data);
            limpaData();
            carregaCalendario();
        }
    }); 
}
function carregaCalendario(){
    var semana_funcionando   = local.find(':selected').data("dias");
    bloquear = converteSemanaBloqueada(semana_funcionando);

    $('#dateval').datepicker("destroy");
    $('#dateval').datepicker({
        language:"pt-BR",
        //daysOfWeekDisabled: bloquear,
        todayBtn: true,
        todayHighlight: true,
        calendarWeeks: true,
        autoclose: true,
        //datesDisabled:['19/05/2017'],
        beforeShowDay: function (date){
            var diaDate = date.getYear()+"-"+date.getMonth()+"-"+date.getDate();
            var contador_de_achados = 0;

            if(typeof libera_dia[0] !=='undefined'){
                for(var i=0;i<libera_dia.length;i++){
                    var dia = libera_dia[i].getYear()+"-"+libera_dia[i].getMonth()+"-"+libera_dia[i].getDate();

                    if(diaDate == dia){
                        contador_de_achados++;
                        return {
                            classes:'active'
                        };
                    }
                }
            }
            if(contador_de_achados==0 || typeof libera_dia[0] === 'undefined'){
                for(var i =0;i<bloquear.length;i++)
                {
                    if(date.getDay() == bloquear[i]){
                        return false;
                    }
                } 
            }
            
        }
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