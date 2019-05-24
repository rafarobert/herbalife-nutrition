
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
}