var oDateTime = {

    formatDate: 'dd-MM-yyyy',
    formatDateTime: 'dd-MM-yyyy hh:ii',

    init: function() {
        $('.form_date').datetimepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayBtn: true,
            minView: 2,

        });
        $('.form_datetime').datetimepicker({
            format: "yyyy-mm-dd HH:ii",
            showMeridian: true,
            autoclose: true,
            todayBtn: true
        });
    },
}