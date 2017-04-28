var hi = $('#horario_inicio');
var hf = $('#horario_final');

function checaHoras(){
    if(parseInt(hi.val()) > parseInt(hf.val())){
       hi.val("");
       hf.val("");
       alert("O horário final não pode ser maior que o inicial");
    }
}


var hiM = $('#iLocal');
var hfM = $('#fLocal');
function checaHorasModal(){
    if(parseInt(hiM.val()) > parseInt(hfM.val())){
       hiM.val("");
       hfM.val("");
       alert("O horário final não pode ser maior que o inicial");
    }
}