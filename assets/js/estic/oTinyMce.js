
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

