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
}