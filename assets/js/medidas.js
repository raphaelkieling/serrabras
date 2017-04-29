function deletar(id){
    if(confirm('Quer mesmo deletar?')){
        $.ajax({
            url:'medidas/deleta/'+id,
            success:function(data){
                $('#'+id).fadeOut();
            }
        });
    }
}