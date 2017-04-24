var data = "";

$('#dateval div').datepicker({
    language:"pt-BR",
    daysOfWeekDisabled: "0,6",
    todayBtn: true,
    todayHighlight: true,
    calendarWeeks: true,
    autoclose: true
}).on('changeDate',function(e){
    data = e.format('dd/mm/yyyy');
    alert(data);
});

