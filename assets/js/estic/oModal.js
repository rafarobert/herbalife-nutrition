var oModal = {
    verified: false,
    formData: [],
    formDataPks: [],
    error: '',
    json: null,
    redirect: null,
    open: function (obj, modal) {
        var id = $(obj).attr('id');
        console.log('Modal has been opened');
        if (modal !== undefined) {
            var toReturn = $(obj).attr('name');
            $('#' + modal + '_modal').find('input[name="toReturn"]').val(toReturn);
            $('#' + modal + '_modal').modal();
        }
    },
    returnIcon: function (obj) {
        // --------------- respuesta desde modal de icons ------------
        var icon = $(obj).find('i')[0].outerHTML;
        var idModal = $(obj).closest('.modal').attr('id');
        var nameToReturn = $('#'+idModal).find('input[name="toReturn"]').val();
        $('#'+idModal).modal('toggle');
        $('input[name="' + nameToReturn + '"]').val(icon);
        // ---------------------------- 0 -----------------------------
    },
}