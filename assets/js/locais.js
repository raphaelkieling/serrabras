var limitador = $('#limitador');
var limitador_input = $('#limitador_input');

var h_i = $('#horario_inicial');
var h_i_m = $('#horario_inicial_minutos');
var h_i_f = h_i.val()+h_i_m.val();
//serve SOMENTE para criar os horários dinamicamente na pagina de locais para a vizualização
function criaHoras(){
    moment.locale('pt-BR');
    atualizaHoraFinal();
    $('.horarios-label').html("");
    //mostra o primeiro horário
    var hora_inicial_moment = moment(h_i_f,'hmm').format('HH:mm');
    $('.horarios-label').append("<div class='label label-success'> Dás - "+hora_inicial_moment+"</div><br>");

    //começa a criar os horários
    var hora_antiga = moment(h_i_f,'hmm').format('HH:mm');
    for(var i = 2;i<limitador.val();i+=2){
        var hora_nova = moment(h_i_f,'hmm').add(i, 'hours').format('HH:mm');

        $('.horarios-label').append("<div class='label label-primary'>"+hora_antiga+" - "+hora_nova+"</div><br>");
        var hora_antiga = moment(h_i_f,'hmms').add(i, 'hours').format('HH:mm');
    }

    var hora_final = hora_antiga;
    //mostra o ultimo horário
     $('.horarios-label').append("<div class='label label-success'>"+"Até - "+hora_final+"</div><br>");
}

function mudaRangeInput(){
    limitador_input.val(limitador.val());
}

function mudaRangeRange(){
    limitador.val(limitador_input.val());
    criaHoras();
}
function atualizaHoraFinal(){
     h_i_f = h_i.val()+h_i_m.val();
}