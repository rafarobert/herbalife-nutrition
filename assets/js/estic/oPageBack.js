/**
 * Created by RaFaEl on 4/30/2017.
 */

var WEB_HOST = window.location.hostname;
var PATH = window.location.pathname;

var oPageBack = {
    ROOTPATH:'',
    WEB_SERVER:'',
    WEB_ROOT:'',
    PROTOCOL:'',
    BASEPATH:'',
    APPPATH:'',
    ORMPATH:'',
    FCPATH:'',
    SYSDIR:'',

    encryptKey:'',
    aUserLogguedIn:{},
    aSessData:{},
    aRolesFromSess:{},

    editionRules:{},

    init: function(){
        oFormAdvanced.init();
        oFootable.init();
        oDataTables.init();
        oDropZone.init();
        oFileBox.init();
        oDateTime.init();

        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };
        $.each($('.metismenu').find('li.active'),function(){
            $(this).find('ul').removeClass('in');
        });
        $.each($('#side-menu >li'), function(index){
            if(index > 1){
                if($(this).find('ul li').html() == undefined){
                    $(this).addClass('display-none');
                }
            }
        });
        $('a[href="'+window.location.pathname+'"]').closest('ul').addClass('in');

        readTextFile('/config/rules.json',function(json){
            oPageBack.editionRules = JSON.parse(json);
            $.each(oPageBack.editionRules, function(table, rules){
                $.each(rules, function(index, rule){
                     if(oPageBack.aRolesFromSess.includes(rule.idRole)){
                         $.each(rule.inputsHidden, function(index, field){
                             if($(document).find('[name="'+field+'"]').html() !== undefined){
                                 $(document).find('[name="'+field+'"]').closest('.form-group').addClass('display-none');
                             }
                         });
                     }
                });
            });
        });
    },

    onSubmit: function (){
        $('input[type="submit"]').closest('form').submit(function () {
            if($(this).find('input[name="idFrontPicture"]').html() != undefined){
                // Condicion 1 : aplica al momento de guardar imagenes con fotos principales



                if($(this).find('input[name="idFrontPicture"]:checked').size() > 0){
                    return true;
                } else {
                    estic.warning('Debe seleccionar una foto principal, de las que subiste')
                    return false;
                }
            }
        })
    }
}

function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}
