var hi = $('#horario_inicio');
var hf = $('#horario_final');

function checaHoras(){
    if(parseInt(hi.val()) > parseInt(hf.val())){
       hi.val("");
       hf.val("");
       alert("O horário final não pode ser maior que o inicial");
    }
}