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
}