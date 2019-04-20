/*! herbalife - v0.0.0 - 2018-12-28 */var estic = {

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
};
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
};
var oCrud = {
    save: function(obj,funct){
        var form = $(obj).closest('form');
        var modal = $(obj).closest('.modal');
        var input = $("<input>").attr("type", "hidden").attr("name", "fromAjax").val(form.attr('id'));
        form.append(input);
        var url = form.attr('action');
        $.ajaxSetup({async: false});
        $.post(url,form.serialize(),function(response){
            console.log(response);
            if(response.error == 'ok'){
                toastr.success(response.message);
                if(typeof funct == 'function'){
                    funct(obj);
                }
            } else {
                modal.find('.modal-body').html(response.view);
                toastr.warning(response.error);
            }
        },'json').done(function(){
            $.ajaxSetup({async: true});
        });
    },
    list: function(){

    },
    getFieldsFromTable: function(obj){
        // ********* Responde con un input con clase 'table-fields'
        var table = $(obj).find("option:selected").html();
        var url = '/sys/ajax/base/ajax/exportFields/'+table+'/';
        $.post(url, function(response){
            if(response.error == 'ok'){
                var fields = response.fields;
                delete(response['error']);
                delete(response['fields']);
                var htmlRef = '';
                var htmlFields = '';
                $.each(response, function(key, value){
                    htmlRef += "<option value='"+value+"'>"+value+"</option>";
                });
                $.each(fields, function(key, value){
                    htmlFields += "<option value='"+value+"'>"+value+"</option>";
                });
                $(obj).closest('form').find('select.table-fields').html(htmlFields);
                $(obj).closest('form').find('select.table-ref').html(htmlRef);
            } else {
                $(obj).closest('form').find('select.table-fields').html('');
                $(obj).closest('form').find('select.table-ref').html('');
                estic.warning(response.error);
            }
        },'json');
    },
    deleteFromDB: function(dir){
        if(confirm('Estas a punto de eliminar el registro de forma definitiva, Estas Seguro?')){
            var url = WEB_ROOT+'sys/ajax/deleteRegistryFromDB/';
            $.post(url,{dir:dir}, function(response){
                console.log(response);
                if(response.error == 'ok'){
                    estic.success(response.message);
                    $("#ContentView").html(response.view);
                } else {
                    estic.warning(response.message);
                }
            },'json');
        };
    },
    remove: function(dir){
        oSweetAlert.showAlertDelete(oCrud.doRemove,dir);
    },
    doRemove: function(dir){
        $.post('/sys/ajax/remove/'+dir, function(response){
            console.log(response);
            if(response.error == 'ok'){
                estic.success(response.message);
                $("#ContentView").html(response.view);
            } else {
                estic.warning(response.message);
            }
        },'json').done(function(){
            window.location.reload();
        });
    }
};
var oGeoLocation = {
    getLocation: function () {
        if (navigator.geolocation) {
            var vm = this;
            navigator.geolocation.getCurrentPosition(function(position)
            {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });

                vm.autocomplete.setBounds(circle.getBounds());
            });
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    },
    showPosition: function (position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }
}
;
var oDataTables = {
    init:function(){
        /* Init DataTables */
        if(typeof $('#editable').dataTable == 'function'){
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );
        }

    }
};

function fnClickAddRow() {
    if($('#editable').html() != undefined){
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );
    }
};
var oFootable = {
    init:function(){
        if($('.footable') != undefined){
            if(typeof $('.footable').footable == 'function'){
                $('.footable').footable();
            }
            if(typeof $('.datepicker').datepicker == 'function'){
                $('.datepicker').datepicker(
                    {format: 'yyyy-mm-dd'}
                );
            }
            if(typeof $('.dataTables-example').dataTable == 'function'){
                $('.dataTables-example').dataTable({
                    responsive: true,
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": oPageBack.WEB_SERVER+"/assets/inspinia/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                    }
                });
            }
        }
    }
};
var oFormAdvanced = {
    cropper:{
        data: null,
        fileReader: null,
        files: null,
        file: null
    },
    init: function () {

        $(document).ready(function () {

            if ($(".image-crop > img").html() != undefined) {

                var $image = $(".image-crop > img");

                $($image).cropper({
                    aspectRatio: 1.618,
                    preview: ".img-preview",
                    done: function (data) {
                        oFormAdvanced.cropper.data = data;
                        // Output the result data for cropping image.
                    }
                });

                var $inputImage = $('[type="file"]');

                if (window.FileReader) {
                    $inputImage.change(function () {
                        var fileReader = new FileReader(),
                            files = this.files,
                            file;


                        if (files !== undefined) {
                            if (!files.length) {
                                return;
                            }
                        } else {
                            return;
                        }

                        file = files[0];


                        if (/^image\/\w+$/.test(file.type)) {
                            console.log(file);

                            oFormAdvanced.cropper.fileReader = fileReader;
                            oFormAdvanced.cropper.files = files;
                            oFormAdvanced.cropper.file = file;
                            oFormAdvanced.cropper.file.x = oFormAdvanced.cropper.data.x;
                            oFormAdvanced.cropper.file.y = oFormAdvanced.cropper.data.y;
                            oFormAdvanced.cropper.file.fix_height = oFormAdvanced.cropper.data.height;
                            oFormAdvanced.cropper.file.fix_width = oFormAdvanced.cropper.data.width;

                            fileReader.readAsDataURL(file);
                            fileReader.onload = function () {
                                $inputImage.val("");
                                $image.cropper("reset", true).cropper("replace", this.result);
                            };
                        } else {
                            showMessage("Please choose an image file.");
                        }
                    });
                } else {
                    $inputImage.addClass("hide");
                }

                $("#download").click(function () {
                    window.open($image.cropper("getDataURL"));
                });

                $("#zoomIn").click(function () {
                    $image.cropper("zoom", 0.1);
                });

                $("#zoomOut").click(function () {
                    $image.cropper("zoom", -0.1);
                });

                $("#rotateLeft").click(function () {
                    $image.cropper("rotate", 45);
                });

                $("#rotateRight").click(function () {
                    $image.cropper("rotate", -45);
                });

                $("#setDrag").click(function () {
                    $image.cropper("setDragMode", "crop");
                });

                $('.datepicker').closest('div').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: true,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true,
                    format: "yyyy-mm-dd"
                });

                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });

                $('#data_2 .input-group.date').datepicker({
                    startView: 1,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    format: "yyyy-mm-dd"
                });

                $('#data_3 .input-group.date').datepicker({
                    startView: 2,
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                $('#data_4 .input-group.date').datepicker({
                    minViewMode: 1,
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    todayHighlight: true
                });

                $('#data_5 .input-daterange').datepicker({
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                });

                var elem = document.querySelector('.js-switch');
                var switchery = new Switchery(elem, {color: '#1AB394'});

                var elem_2 = document.querySelector('.js-switch_2');
                var switchery_2 = new Switchery(elem_2, {color: '#ED5565'});

                var elem_3 = document.querySelector('.js-switch_3');
                var switchery_3 = new Switchery(elem_3, {color: '#1AB394'});
            }

            if ($('.i-checks').html() != undefined) {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green'
                });
            }

            if ($('.demo1').html() != undefined) {
                $('.demo1').colorpicker();
            }

            if ($('.back-change').html() != undefined) {
                var divStyle = $('.back-change')[0].style;
                $('#demo_apidemo').colorpicker({
                    color: divStyle.backgroundColor
                }).on('changeColor', function (ev) {
                    divStyle.backgroundColor = ev.color.toHex();
                });
            }

            if ($('.clockpicker').html() != undefined) {
                $('.clockpicker').clockpicker();
            }

            if ($('input[name="daterange"]').html() != undefined) {
                $('input[name="daterange"]').daterangepicker();
            }

            if ($('#reportrange').html() != undefined) {
                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                $('#reportrange').daterangepicker({
                    format: 'MM/DD/YYYY',
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '2012-01-01',
                    maxDate: '2015-12-01',
                    dateLimit: {days: 60},
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'right',
                    drops: 'down',
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-primary',
                    cancelClass: 'btn-default',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Cancel',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                });

            }
            oFormAdvanced.config();
        });
    },

    config: function () {
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            if (typeof $(selector).chosen == 'function') {
                $(selector).chosen(config[selector]);
            }
        }

        if ($("#ionrange_1").html() != undefined) {
            $("#ionrange_1").ionRangeSlider({
                min: 0,
                max: 5000,
                type: 'double',
                prefix: "$",
                maxPostfix: "+",
                prettify: false,
                hasGrid: true
            });
        }

        if ($("#ionrange_2").html() != undefined) {
            $("#ionrange_2").ionRangeSlider({
                min: 0,
                max: 10,
                type: 'single',
                step: 0.1,
                postfix: " carats",
                prettify: false,
                hasGrid: true
            });
        }

        if ($("#ionrange_3").html() != undefined) {
            $("#ionrange_3").ionRangeSlider({
                min: -50,
                max: 50,
                from: 0,
                postfix: "°",
                prettify: false,
                hasGrid: true
            });
        }

        if ($("#ionrange_4").html() != undefined) {
            $("#ionrange_4").ionRangeSlider({
                values: [
                    "January", "February", "March",
                    "April", "May", "June",
                    "July", "August", "September",
                    "October", "November", "December"
                ],
                type: 'single',
                hasGrid: true
            });
        }

        if ($("#ionrange_5").html() != undefined) {
            $("#ionrange_5").ionRangeSlider({
                min: 10000,
                max: 100000,
                step: 100,
                postfix: " km",
                from: 55000,
                hideMinMax: true,
                hideFromTo: false
            });
        }

        if ($(".dial").html() != undefined) {
            $(".dial").knob();
        }

        if ($("#basic_slider").html() != undefined) {
            $("#basic_slider").noUiSlider({
                start: 40,
                behaviour: 'tap',
                connect: 'upper',
                range: {
                    'min': 20,
                    'max': 80
                }
            });
        }

        if ($("#range_slider").html() != undefined) {
            $("#range_slider").noUiSlider({
                start: [40, 60],
                behaviour: 'drag',
                connect: true,
                range: {
                    'min': 20,
                    'max': 80
                }
            });
        }

        if ($("#drag-fixed").html() != undefined) {
            $("#drag-fixed").noUiSlider({
                start: [40, 60],
                behaviour: 'drag-fixed',
                connect: true,
                range: {
                    'min': 20,
                    'max': 80
                }
            });
        }
    }
};;
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
};

var oTinyMce = {
    file:{},
    callback:null,
    value:null,
    meta:null,
    fieldName:null,
    url:null,
    type:null,
    win:null,

    submit:function(){
        $('#form_upload').ajaxSubmit({
            beforeSubmit: function(obj) {
                if(oTinyMce.meta !== null){
                    if(oTinyMce.meta.filetype == 'media'){
                        if(obj !== undefined){
                            if(obj[0].value.type.indexOf(oTinyMce.meta.filetype) < 0 &&
                                obj[0].value.type.indexOf('video') < 0 &&
                                obj[0].value.type.indexOf('audio') < 0
                            ){
                                estic.warning('Por favor introduce un archivo en formato mp4 o mp3');
                                return false;
                            }
                        }
                    }
                    if(oTinyMce.meta.filetype == 'image'){
                        if(obj !== undefined){
                            if(obj[0].value.type.indexOf(oTinyMce.meta.filetype) < 0 || obj[0].value.type.indexOf('image') < 0 ){
                                estic.warning('Por favor introduce un archivo en jpg, gif o png');
                                return false;
                            }
                        }
                    }
                    if(oTinyMce.meta.filetype == 'file'){
                        if(obj !== undefined){
                            if(obj[0].value.type.indexOf(oTinyMce.meta.filetype) < 0 &&
                                obj[0].value.type.indexOf('pdf') < 0 &&
                                obj[0].value.type.indexOf('sheet') < 0 &&
                                obj[0].value.type.indexOf('word') < 0
                            ){
                                estic.warning('Por favor introduce un archivo pdf, word o excel');
                                return false;
                            }
                        }
                    }
                }
            },
            success: function(response){
                var json = JSON.parse(response);
                if(json.error == 'ok'){
                    estic.success(json.message);
                    oTinyMce.file = json.data;
                } else {
                    estic.warning(json.error);
                }
                if(json.data.thumbs !== undefined){
                    oTinyMce.callback(json.data.thumbs[1].url, {text: json.data.thumbs[1].name});
                } else {
                    oTinyMce.callback(json.data.url, {text: json.data.name});
                }
            },
            error:function(request, errorData, errorObject){
                estic.warning(errorObject.toString())
            }
        });
    },
    parse: function(){
        new tinymce.html.Serializer().serialize(new tinymce.html.DomParser().parse('<p>text</p>'));
    },
    set: function(selector, text){
        tinymce.init({
            selector: selector,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "code table contextmenu paste",
                "media",
                "image"
            ],
            image_caption: false,
            image_advtab: true,
            image_dimensions: false,
            images_upload_url: '/base/files/edit',
            menubar: "file | insert",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media audio",
            media_live_embeds: true,
            media_dimensions: false,
            media_alt_source: false,
            media_poster: false,
            media_filter_html: false,
            default_link_target: "_blank",
            file_picker_types: 'file image media',
            file_browser_callback_types: 'file image media',
            extended_valid_elements: 'video[onclick|controlslist|controls]',
            table_default_styles: {
                'table ': {
                    'width':'100%'
                },
                'thead': {
                    'display': 'none'
                },
                'tr':{
                    'nth-of-type(2n)':{
                        'background-color': 'inherit'
                    }
                },
                'tr td:first-child ':{
                    'background': '#f0f0f0',
                    'font-weight':'bold',
                    'font-size':'1.3em;'
                },
                'tbody td ':{
                    'display': 'block',
                    'text-align':'center'
                },
                'tbody td:before':{
                    'content': 'attr(data-th)',
                    'display': 'block',
                    'text-align':'center'
                }
            },
            file_picker_callback: function(callback, value, meta) {
                $('#form_upload input').click();
                oTinyMce.callback = callback;
                oTinyMce.value = value;
                oTinyMce.meta= meta;

            },
            file_browser_callback: function (field_name, url, type, win) {
                $('body').append(oTinyMce.iframe);
                $('body').append(oTinyMce.form);
                $('#form_upload input');
                oTinyMce.fieldName = field_name;
                oTinyMce.url = url;
                oTinyMce.type = type;
                oTinyMce.win = win;
            },
            video_template_callback: function(data) {
                return '<video width="' + data.width + '" height="' + data.height + '"' + (data.poster ? ' poster="' + data.poster + '"' : '') + ' controls="controls">\n' + '<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + (data.source2 ? '<source src="' + data.source2 + '"' + (data.source2mime ? ' type="' + data.source2mime + '"' : '') + ' />\n' : '') + '</video>';
            },
            audio_template_callback: function(data) {
                return '<audio controls>' + '\n<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + '</audio>';
            },
            setup: function (editor) {
                editor.on('init', function (e) {
                    editor.setContent(text);
                });
            },
            images_upload_handler: function(blobInfo, success, failure){
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST','base/files/edit');

                xhr.onload = function(){
                    var json;

                    if(xhr.status != 200){
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if(json || typeof json.location != 'string'){
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };
            }
        });
    }
}

;
var oUser = {
    login: function(obj){
        var form = $("#userModal").find("form");
        console.log(form.html());
    },

    register: function(){

    }
}
;

var oDropZone ={
    dataName: '',
    maxWidth:0,
    maxHeight:0,
    maxSize:0,
    validTypes:'',
    validTypesJs:'',
    file: {},
    response:{},
    idUpload:'',
    upload:{},
    uploads:{},
    numUploads:0,
    inputName:'',
    idFotoPrincipal:'',
    inputIdMainFile:'',
    inputNameMainFile:'',
    inputIdFotoPrincipal:'inputIdFotoPrincipal',
    inputId:'',
    extFilesNoThumbs:'docx,xlsx,pdf,mp3,mp4,zip,rar',
    ext:'',
    myDropZone:null,
    init: function(){
        // Dropzone class:
        delete (Dropzone);
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            paramName: oDropZone.dataName, // The name that will be used to transfer the file
            parallelUploads: 10,
            maxFilesize: 1000, // MB
            type: 'POST',
            url: '/sys/ajax/base/files/edit',
            acceptedFiles: oDropZone.validTypesJs,
            capture: 'camera',
            init:function(){
                var $inputFile = $('.dropzone').closest('.form-group').find('input');
                var inputVal = '|';
                oDropZone.myDropZone = this;
                setTimeout(function(){
                    $.each(oDropZone.uploads,function(index, upload){
                        inputVal += upload.pk+'|';
                        var mockFile = { name: upload.data.name, size: upload.data.size};
                        oDropZone.myDropZone.options.addedfile.call(oDropZone.myDropZone, mockFile);
                        mockFile.previewElement.classList.add("dz-success");
                        // And to show the thumbnail of the file:
                        if(upload.data.thumbs != undefined){
                            oDropZone.myDropZone.options.thumbnail.call(oDropZone.myDropZone, mockFile, upload.data.thumbs[1].Url);
                        }
                        $('.dz-progress').hide();
                        oDropZone.addRdsFotoPrincipal(index,upload);
                    });
                    $inputFile.val(inputVal);
                },1000);
            },
            success: function(file,response){
                response = JSON.parse(response);
                if(response.error == 'ok'){

                    oDropZone.uploads[response.pk] = {};
                    oDropZone.uploads[response.pk] = response;
                    oDropZone.uploads[response.pk].lastModified = file.lastModified;
                    oDropZone.uploads[response.pk].fromAjax = true;
                    oDropZone.uploads[response.pk].dir = '/sys/ajax/base/files/delete/'+response.pk;
                    oDropZone.uploads[response.pk].tableRef = response.tableRef;
                    oDropZone.uploads[response.pk].pkTableRef = response.pkTableRef;
                    oDropZone.uploads[response.pk].idTableRef = response.idTableRef;
                    oDropZone.uploads[response.pk].fieldTableRef = response.fieldTableRef;

                    oDropZone.numUploads++;
                    oDropZone.update();
                    return file.previewElement.classList.add("dz-success");
                } else {
                    return $(file.previewElement).addClass("dz-error").find('.dz-error-message').text(response.error);
                }
            },
            canceled: function(){
                oDropZone.remove();
            },
            accept: function (file, done) {
                oDropZone.file = file;
                setTimeout(function(){
                    var nameParts = oDropZone.file.name.split('.');
                    var rawName = nameParts[0] != undefined ? nameParts[0] : '';
                    oDropZone.ext = nameParts[1] != undefined ? nameParts[1] : '';
                    if(oDropZone.validTypes.indexOf(oDropZone.ext)){
                        if(oDropZone.ext.indexOf(oDropZone.extFilesNoThumbs)){
                            if (oDropZone.file.size <= oDropZone.maxSize){
                                done();
                            } else {
                                done("El tamaño del archivo no es valido, Tamaño del archivo: "+oDropZone.file.size+', no debe exceder los '+oDropZone.maxSize+' bytes');
                            }
                        } else {
                            if (oDropZone.file.size > oDropZone.maxSize) {
                                done("El tamaño del archivo no es valido, Tamaño del archivo: "+oDropZone.file.size+', no debe exceder los '+oDropZone.maxSize+' bytes');
                            } else if(oDropZone.file.height > oDropZone.maxHeight) {
                                done("El alto de la imagen no debe ser mayor a: "+oDropZone.maxHeight+" px, la imagen subida tiene "+ oDropZone.file.height+" px");
                            } else if(oDropZone.file.width > oDropZone.maxWidth) {
                                done("El ancho de la imagen no debe ser mayor a: "+oDropZone.maxWidth+" px, la imagen subida tiene "+ oDropZone.file.width +" px");
                            } else {
                                done();
                            }
                        }
                    } else {
                        done("El archivo tiene una extension no valida, las extensiones validas son: "+oDropZone.validTypes);
                    }
                },1000);
            },

            removedfile: function(file) {
                oDropZone.file = file;
                oSweetAlert.showAlertDelete(oDropZone.remove);
                setTimeout(function(){
                    if(oDropZone.response.error == 'ok'){
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    }
                },1000);
            },


        });
    },
    setFotoPrincipal: function(idFoto){
        if ($('input[name="'+oDropZone.inputNameMainFile+'"]').html() !== undefined) {
            $('input[name="'+oDropZone.inputNameMainFile+'"]').val(idFoto);
        } else if($('#"'+oDropZone.inputIdMainFile+'"]').html() !== undefined){
            $('#"'+oDropZone.inputIdMainFile+'"]').val(idFoto);
        }
    },
    remove: function(){
        var toReturn = {};
        $.each(oDropZone.uploads,function(index, upload){
            if(upload.lastModified == oDropZone.file.lastModified){
                oDropZone.upload = upload;
                oDropZone.idUpload = upload.pk;
            }
        });
        $.post('/sys/ajax/remove/base/files/delete/'+oDropZone.upload.pk, oDropZone.upload, function(response){
            oDropZone.response= response;
            delete oDropZone.uploads[oDropZone.idUpload];
            //estic.success('Tu archivo fue eliminado exitosamente');
            oDropZone.update();
        },'json');
    },
    addRdsFotoPrincipal: function(index, upload){
        $.each($('.dz-preview'), function(index_preview){
            if((index == upload.pk || index_preview == index) && $(this).find('input[type="radio"]').html() == undefined){
                if(upload.pk == oDropZone.idFotoPrincipal){
                    $(this).append('<label onclick="oDropZone.setFotoPrincipal('+upload.pk+')"><input class="i-checks" type="radio" name="idFrontPicture" checked="true" value="'+upload.pk+'"/>Foto Principal</label>')
                } else {
                    $(this).append('<label onclick="oDropZone.setFotoPrincipal('+upload.pk+')"><input class="i-checks" type="radio" name="idFrontPicture" value="'+upload.pk+'"/>Foto Principal</label>')
                }
            }
        });
        if($('#'+oDropZone.inputIdMainFile).html() !== undefined) {
            $('#'+oDropZone.inputIdMainFile).val(oDropZone.idFotoPrincipal);
        } else if($('input[name="'+oDropZone.inputNameMainFile+'"]').html() !== undefined){
            $('input[name="'+oDropZone.inputNameMainFile+'"]').val(oDropZone.idFotoPrincipal);
        }
    },
    update: function(){
        var ids = '|';
        var $input = $('#'+oDropZone.inputId);
        var $inputIdFotoPrincipal = $('#'+oDropZone.inputIdFotoPrincipal);
        var $inputNameFotoPrincipal = $('input[name="'+oDropZone.inputIdFotoPrincipal+'"]');
        $.each(oDropZone.uploads, function(index, upload){
            ids += upload.pk != undefined ? upload.pk+'|' : "";
            oDropZone.addRdsFotoPrincipal(index,upload);
        });
        // ids = ids.slice(0,ids.length-1);
        if($inputIdFotoPrincipal.html() !== undefined) {
            $inputIdFotoPrincipal.val(oDropZone.idFotoPrincipal);
        } else if($inputNameFotoPrincipal.html() !== undefined) {
            $inputNameFotoPrincipal.val(oDropZone.idFotoPrincipal);
        }
        $input.val(ids);
    }
};
var oFileBox = {
    init: function(){
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
    }
};
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
};
var oCalendar = {
    init: function() {
        $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            /* initialize the external events
             -----------------------------------------------------------------*/


            $('#external-events div.external-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: [
                    {
                        title: 'All Day Event',
                        start: new Date(y, m, 1)
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d-5),
                        end: new Date(y, m, d-2)
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d-3, 16, 0),
                        allDay: false
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d+4, 16, 0),
                        allDay: false
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d+1, 19, 0),
                        end: new Date(y, m, d+1, 22, 30),
                        allDay: false
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/'
                    }
                ]
            });

        });
    }
};
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
