function formAdd(){
    $('tbody').append("<tr>"+
            "<td><input name='nmr_pacotes[]' class='form-control form-table-input'></td>"+
            "<td>"+
                "<select name='medida[]' class='form-control form-table-input'>"+
                    "<option>B1-17-18</option>"+
                "</select>"+
            "</td>"+
            "<td><input name='pecas[]' class='form-control form-table-input'></td>"+
            "<td><button onclick='formAdd();' class='btn btn-default btn-secondary'><span class='glyphicon glyphicon-plus'></span></button></td>"+
        "</tr><tr><td> &nbsp</td></tr>");
}
formAdd();

var horaEscolhida = "Nenhuma";
$('.hora-aberta').click(function(){

    $('.hora-aberta').css("cssText", "background: #ffbd4a !important;");
    $(this).css("cssText", "background: #5fbeaa !important;");

    horaEscolhida = $(this).attr('id');
    $('#hora_form').val(horaEscolhida);

})

function verificaData(){
    var datepicker = $('#dateval');

    var semana = ["Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado"];
    var data = datepicker.val();
    var arr = data.split("/").reverse();
    var data_semana = new Date(arr[0], arr[1] - 1, arr[2]);
    var dia = data_semana.getDay();

    if(semana[dia] == semana[0] || semana[dia] == semana[6]){
        alert("Final de semana");
        datepicker.val('');
    }else{
        data_convertida = convertData(data);
        $.ajax({
            url:'agendamento/buscahorario/'+data_convertida,
            success:function(data){
                if(data.length==0){
                    mostraHoras();
                }
                for(var i=0;i<data.length;i++){
                    var horario_esconde = data[i]['hora_entrega'];
                    $('#'+horario_esconde).hide();
                    $('#'+horario_esconde).removeClass('hora-aberta');
                }
            }
        })
    }
}

function convertData(data){
    var calendario = data.split('/');
    return calendario[0]+"-"+calendario[1]+"-"+calendario[2];
}

function mostraHoras(){
    $('#5').addClass('hora-aberta').show();
    $('#8').addClass('hora-aberta').show();
    $('#11').addClass('hora-aberta').show();
    $('#14').addClass('hora-aberta').show();
    $('#17').addClass('hora-aberta').show();
    $('#20').addClass('hora-aberta').show();
    $('hora-aberta').show();
}