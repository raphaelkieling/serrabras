function formAdd(){
    $('tbody').append("<tr>"+
            "<td><input class='form-control form-table-input'></td>"+
            "<td>"+
                "<select class='form-control form-table-input'>"+
                    "<option>B1-17-18</option>"+
                "</select>"+
            "</td>"+
            "<td><input class='form-control form-table-input'></td>"+
            "<td><button onclick='formAdd();' class='btn btn-default btn-secondary'><span class='glyphicon glyphicon-plus'></span></button></td>"+
        "</tr><tr><td> &nbsp</td></tr>");
}
formAdd();

var horaEscolhida = "";
$('.hora-aberta').click(function(){
    $('.hora').css("cssText", "background: #ffbd4a !important;");
   $(this).css("cssText", "background: #5fbeaa !important;")
   horaEscolhida = $(this).attr('id');
   alert(horaEscolhida);
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
    }
}
