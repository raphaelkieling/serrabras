// var hoje = moment('2017-04-28');
// var talvez = moment('2017-04-27');

// var diff = hoje.diff(talvez,"days");

// alert(diff);
moment.locale('pt-br');

function convertData(data){
    var calendario = data.split('/');
    return calendario[2]+"-"+calendario[1]+"-"+calendario[0];
}

function comparaData(){
    var dInicio = moment(convertData($('#data_inicio').val()));
    var dFinal  = moment(convertData($('#data_final').val()));

    var result = dFinal.diff(dInicio,'days');

    if(result < 0){
        confirm('Desculpe mas o horário final deve ser maior que o horário início');
        $('#data_inicio').val("");
        $('#data_final').val("");
    }
}

function retiraVencidos(){
    $('.container').find('.notificacao_verificar').each(function(){
        var data_inicial = $(this).find('.data_inicial').text();
        var data_final = $(this).find('.data_final').text();

        var agora = moment();
        var final = moment(convertData(data_final));
        var inicial = moment(convertData(data_inicial));

        if(final.diff(agora,'days') < 0 || inicial.diff(agora,'days')-1 >= 0 ){
            $(this).css('opacity','0.2');
        }
    })
}

function cooNotificacao(){
    $('.container').find('.notificacao_verificar').each(function(){
        var data_inicial = $(this).find('.data_inicial').val();
        var data_final = $(this).find('.data_final').val();

        var agora = moment();
        var final = moment(convertData(data_final));
        var inicial = moment(convertData(data_inicial));

        if(final.diff(agora,'days') < 0 || inicial.diff(agora,'days')-1 >= 0 ){
            $(this).hide();
        }
    });
}
function entendi(id){
    $('#'+id).fadeOut();
}
retiraVencidos();
cooNotificacao();