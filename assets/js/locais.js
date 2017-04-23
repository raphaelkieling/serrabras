atualizaTabela();

function cadastrar(){
    var nome = $('#nome').val();
    var horario_final = $('#horario_final').val();
    var horario_inicio = $('#horario_inicio').val();

    $.ajax({
        url:'locais/cadastro',
        method:'POST',
        data:{nome:nome,horario_final:horario_final,horario_inicial:horario_inicio},
        success:function(data){
            if(data){
                atualizaTabela();
            }else{
                alert('Aldo deu errado...');
            }
        }
    })
}

function atualizaTabela(){
    $('tbody').html("");
    $.ajax({
        url:'locais/pegalocais',
        success:function(data){
            for (var index = 0; index < data.length; index++) {
                $('tbody').append("<tr><td>"+data[index]['idLocal']+
                "</td><td>"+data[index]['nome']+
                "</td><td>"+data[index]['horario_inicial']+":00"+
                "</td><td>"+data[index]['horario_final']+":00"+
                // "</td><td><a href='#' onclick='modificar("+data[index]['idLocal']+")' class='btn btn-default btn-primary'>Mudar</a>"+
                "</td><td><a href='#' onclick='deletar("+data[index]['idLocal']+")' class='btn btn-default btn-danger'>Deletar</a>"+
                "</td></tr>");
            }
        }
    })
}
function deletar(id){
    if(confirm('Quer mesmo deletar?')){
        $.ajax({
            url:'locais/deleta/'+id,
            success:function(data){
                atualizaTabela();
            }
        });
    }
}