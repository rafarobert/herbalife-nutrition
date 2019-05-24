/**
 * Created by rafaelgutierrez on 18/7/18.
 */

var estic = {

    minimizeSidebar: function () {
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    },
    errors:{
        auth:{
            'auth/wrong-password':'La contraseña introducida es incorrecta o el usuario no tiene contraseña.',
            'auth/invalid-email':'La direccion de correo no existe o esta mal formada.',
            'auth/too-many-requests':'Demasiados intentos fallidos para ingresar.',
            'auth/popup-closed-by-user':'El popup ha sido cerrado por el usuario antes de finalizar la operacion.',
            'auth/network-request-failed':'Ocurrio un problema en la red, puede ser que el tiempo de espera se agoto o que el servidor es inalcanzable.',
            'auth/auth/user-not-found':'No existe el usuario que acabas de ingresar, El usuario puede haber sido eliminado.',
            'auth/argument-error':'El campo password debe contener un minimo de 6caracteres.'
        }
    },

    success: function(message){
        toastr.success(message);
    },
    warning: function(message){
        toastr.warning(message);
    },
    error: function (message) {
        toastr.error(message);
    },
    info: function (message) {
        toastr.info(message);
    }
}
