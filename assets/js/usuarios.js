function pegaUsuarios(){
    $('tbody').html("");
    $.ajax({
        url:'usuarios/pegausuarios',
        success:function(data){
            for(var index=0;index<data.length;index++){
                $('tbody').append("<tr>"+
                "<td>"+data[index]['idUsuario']+"</td>"+
                "<td>"+data[index]['email']+"</td>"+
                "<td>"+data[index]['senha']+"</td>"+
                "<td>"+data[index]['permissao']+"</td>"+
                "<td><button onclick='apagar("+data[index]['idUsuario']+")' class='btn btn-default btn-danger'>Apagar</button></td>"+
                "</tr>");
            }
        }
    });
}

pegaUsuarios();

function apagar(id){
    if(confirm('Quer mesmo deletar?')){
        $.ajax({
            url:'usuarios/deleta/'+id,
            success:function(data){
                pegaUsuarios();
            }
        });
    }
}