function pegaUsuarios(){
    $('tbody').html("");
    $.ajax({
        url:'usuarios/pegausuarios',
        success:function(data){
            for(var index=0;index<data.length;index++){
                $('tbody').append("<tr id='"+data[index]['idUsuario']+"'>"+
                "<td class='idUsuario'>"+data[index]['idUsuario']+"</td>"+
                "<td class='email'>"+data[index]['email']+"</td>"+
                "<td class='senha'>"+data[index]['senha']+"</td>"+
                "<td class='permissao'>"+data[index]['permissao']+"</td>"+
                "<td><button onclick='modificar("+data[index]['idUsuario']+")' class='btn btn-default btn-warning' style='margin-right:10px'>Modificar</button>"+
                "<button onclick='apagar("+data[index]['idUsuario']+")' class='btn btn-default btn-danger'>Apagar</button>"+
                "</td>"+
                "</tr>");
            }
        }
    });
}

pegaUsuarios();
function modificar(id){
    var email = $('#'+id+" > .email").text();

    $('#mysmall').modal('toggle');

    $('.modal-item-id').html(id);
    $('.modal-item-id').val(id);

    $('.modal-item-email').val(email);
}
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