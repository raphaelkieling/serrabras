
$('#dateval').datepicker({
    startDate: "date",
    language:"pt-BR",
    daysOfWeekDisabled: "0,6",
    todayBtn: true,
    todayHighlight: true,
    calendarWeeks: true,
    autoclose: true
});


//variaveis
var horaEscolhida = "Nenhuma";//variavel que armazena que dia foi escolhido
var horaInicial   = 0; // hora que o local definiu como inicial
var horaFinal     = 0; // hora que foi definida como final do local
var localEscolhido = 0; //local que foi escolhido no select

    verificaDados();
    
    formAdd();
    
    pegaMedidas();
    escondeHoras();

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

function verificaDados(){
    if(horaEscolhida == "Nenhuma" || horaInicial == 0 || horaFinal==0 || localEscolhido == "null"){
        $('#btn-agendar').hide();
    }else{
        $('#btn-agendar').show();
    }
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

function fechaBotoes(){
    horaEscolhida = "Nenhuma";
    for(var i=0;i<24;i++){
        $('#'+i).removeClass('hora-importante');
    }
}

//Coloca o botão como verde e o resto em amarelo para destacar
$('.hora-aberta').click(function(){
    fechaBotoes();

    horaEscolhida = $(this).attr('id');
    $('#hora_form').val(horaEscolhida);
    $(this).addClass('hora-importante');

    verificaDados();
})

//Mostra as horas
function mostraHoras(){
    verificaDados();
    $('#5').show();
    $('#8').show();
    $('#11').show();
    $('#14').show();
    $('#17').show();
    $('#20').show();
    $('.div-horas').show();
    $('.div-horas-message').hide();
}
function escondeHoras(){
    verificaDados();
    $('#5').hide();
    $('#8').hide();
    $('#11').hide();
    $('#14').hide();
    $('#17').hide();
    $('#20').hide();
    $('.div-horas').hide();
    $('.div-horas-message').show();
}

//Verifica a data()
function verificaData(){
    fechaBotoes();
    var datepicker = $('#dateval');

    var semana = ["Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado"];
    var data = datepicker.val();
    var arr = data.split("/").reverse();
    var data_semana = new Date(arr[0], arr[1] - 1, arr[2]);
    var dia = data_semana.getDay();

    if(semana[dia] == semana[0] || semana[dia] == semana[6] || localEscolhido == 'null'){
        datepicker.val('');
    }else{
        if(localEscolhido == ''){
            escondeHoras();
        }
        data_convertida = convertData(data);
        $.ajax({
            url:'agendamento/buscahorario/'+data_convertida+'/'+localEscolhido,
            success:function(data){
                //mostra todas as datas do local
                escondeDataLimite();
                //esconde as dadas usadas nesse dia
                for(var i=0;i<data.length;i++){
                    var horario_esconde = data[i]['hora_entrega'];
                    $('#'+horario_esconde).hide();
                }
                verificaDados();
            }
        });
        
    }
}

function convertData(data){
    var calendario = data.split('/');
    return calendario[0]+"-"+calendario[1]+"-"+calendario[2];
}

function limpaData(){
    $('#dateval').val('');
    escondeHoras();
}
function escondeDataLimite(){
    horaInicial = $('#local').find(':selected').attr('data-init');
    horaFinal = $('#local').find(':selected').attr('data-final');

    fechaBotoes();
    verificaDados();
    mostraHoras();

    localEscolhido = $('#local').val();

    if(localEscolhido == "null"){
        escondeHoras();
        horaEscolhida = "Nenhuma";
    }
    
    console.log(horaInicial+" até "+horaFinal);
   

    for(var i=0;i<horaInicial;i++){
        $("#"+i).hide();
        // alert(horaInicial+" :"+ i);
    }

    for(var j=25;j>horaFinal;j--){
        $("#"+j).hide();
        // alert(" :"+ j);
    }
}