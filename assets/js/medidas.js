pegaMedidas();
function pegaMedidas(){
    $('tbody').html("");
    $.ajax({
        url:'agendamento/buscamedidas',
        success:function(data){
            for(var index=0;index<data.length;index++){
               $('tbody').append("<tr id='"+data[index]['idMedida']+"'><td>"+
               data[index]['idMedida']+
               "</td><td>"+
               data[index]['qualidade']+
               "</td><td>"+
               data[index]['espessura']+
               "</td><td>"+
               data[index]['largura']+
               "</td><td>"+
               data[index]['comprimento']+
               "</td><td>"+
                "<button onclick='deletar("+data[index]['idMedida']+")' class='btn btn-default btn-danger'>Apagar</button>"
               +"</td></tr>");
            }
        }
    })
}
function deletar(id){
    if(confirm('Quer mesmo deletar?')){
        $.ajax({
            url:'medidas/deleta/'+id,
            success:function(data){
                $('#'+id).hide();
            }
        });
    }
}