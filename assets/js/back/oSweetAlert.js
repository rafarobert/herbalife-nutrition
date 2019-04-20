var oSweetAlert = {
    confirm:false,
    showAlert: function () {
        swal({
            title: "Welcome in Alerts",
            text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
        });
    },
    showAlertGoodJob: function () {
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            type: "success"
        });
    },
    showAlertAreYouSure: function () {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });
    },
    showAlertDelete: function (funct,funcParam) {
        var confirm = false;
        var url = $(this).attr('data-url');
        swal({
                title: "Estas seguro?",
                text: "No podrás recuperar este informacion.!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, Eliminarlo!",
                cancelButtonText: "No, Cancelar!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                oSweetAlert.confirm = isConfirm
                if (isConfirm) {
                    if (typeof funct == 'function') {
                        funct(funcParam);
                    }
                    swal("Eliminado!", "Tu informacion fue eliminada Satisfactoriamente.", "success");
                } else {
                    swal("Cancelado", "Tu Informacion esta a salvo :)", "error");
                }
            });
    },
}