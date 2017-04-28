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