// var hoje = moment('2017-04-28');
// var talvez = moment('2017-04-27');

// var diff = hoje.diff(talvez,"days");

// alert(diff);

$('.dateval').datepicker({
    language:"pt-BR",
    daysOfWeekDisabled: "0,6",
    todayBtn: true,
    todayHighlight: true,
    calendarWeeks: true,
    autoclose: true
});
function convertData(data){
    var calendario = data.split('/');
    return calendario[2]+"-"+calendario[1]+"-"+calendario[0];
}

function comparaData(){
    var dInicio = moment(convertData($('#data_inicio').val()));
    var dFinal  = moment(convertData($('#data_final').val()));

    var result = dFinal.diff(dInicio,'days');

    alert(result);
}