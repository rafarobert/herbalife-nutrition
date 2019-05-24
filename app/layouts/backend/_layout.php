<!DOCTYPE html>
<html>

<head>

    <meta name="author" content="<?=$siteDomain?>"/>
    <meta name="theme-color" content="#8C3524">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="author" content="<?=$siteDomain?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$siteTitle?></title>

    <meta name="TITLE" content="estic.com.bo - Todas sus sistemas desarrollados bajo un mismo techo">
    <meta name="REPLY-TO" content="info@estic.com.bo">
    <meta name="DC.Language" scheme="RFC1766" content="Spanish">
    <meta name="DESCRIPTION" content="Estic es el distribuidor, integrador y desarrollador de
    sistemas intelectuales más confiable y orientado al cliente. Representamos las mejores
    soluciones en desarrollo web.
    Nos asociamos con tecnología de punta, desde herramientas manuales hasta servidores.
    Ofrecemos las soluciones no las más caras. Todas sus soluciones de desarrollo de sistemas bajo
    un mismo techo.">
    <meta name="KEYWORDS" content="Bolivia, desarrollo, sistemas, web">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="theme-color" content="#ffffff">
    <meta itemprop="name" content="estic.com.bo - Todas sus sistemas desarrollados bajo un mismo techo"/>
    <meta itemprop="description" content="Estic es el distribuidor, integrador y desarrollador de
    sistemas intelectuales más confiable y orientado al cliente. Representamos las mejores
    soluciones en desarrollo web.
    Nos asociamos con tecnología de punta, desde herramientas manuales hasta servidores.
    Ofrecemos las soluciones no las más caras. Todas sus soluciones de desarrollo de sistemas bajo
    un mismo techo."/>
    <meta itemprop="image" content="/assets/estic/logos/Estic-Logo.png"/>
    <!--  Main Styles  -->
    <!-- Data Tables -->
    <link href="/assets/css/estic-back.min.css" rel="stylesheet">
    <link href="/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="/assets/inspinia/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
    <link href="/assets/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="/assets/inspinia/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- Blue Img Galery-->
    <link href="/assets/inspinia/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <!-- Morris -->
    <link href="/assets/inspinia/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/assets/inspinia/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">


    <!-- Date Time Picker -->
    <link href="/plugins/datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!--  Main Form Items  -->
    <link href="/assets/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="/assets/inspinia/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="/assets/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="/assets/inspinia/css/animate.css" rel="stylesheet">

    <link href="/assets/inspinia/css/plugins/footable/footable.core.css" rel="stylesheet">
    <!--  Main Fonts  -->
    <link href="/assets/css/estic-back.min.css" rel="stylesheet">


    <!-- Mainly scripts -->

    <script src="/assets/js/estic-back.min.js"></script>
    <script src="/assets/js/estic-back.js"></script>

    <!-- Text Editor plugin -->
    <script src="/assets/js/tinymce2/tinymce.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="/assets/inspinia/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date Time Picker -->
    <script src="/plugins/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>



    <?php include_once ROOTPATH."assets/js/js.php"; ?>
</head>

<body class="">
<div class="inspinia">

<?php
if(validateVar($subLayout)){
    $this->load->view($subLayout);
} else {
    if(validateVar($subview)) {
        $this->load->view($subview);
    }
}
?>
</div>
<form id="form_upload" action="/base/files/edit" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
    <input name="image" type="file" onchange="oTinyMce.submit()">
</form>
<!-- Data footable -->
<script src="/assets/inspinia/js/plugins/footable/footable.all.min.js"></script>

<!-- Data Tables -->
<script src="/assets/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/assets/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets/inspinia/js/plugins/jeditable/jquery.jeditable.js"></script>

<!-- DROPZONE -->
<script src="/plugins/dropzone/dropzone.js"></script>
<script src="/assets/inspinia/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/assets/inspinia/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="/assets/inspinia/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<!--  Main Form Items  -->

<!-- Chosen -->
<script src="/assets/inspinia/js/plugins/chosen/chosen.jquery.js"></script>
<!-- JSKnob -->
<script src="/assets/inspinia/js/plugins/jsKnob/jquery.knob.js"></script>
<!-- Input Mask-->
<script src="/assets/inspinia/js/plugins/jasny/jasny-bootstrap.min.js"></script>
<!-- Data picker -->
<!-- NouSlider -->
<script src="/assets/inspinia/js/plugins/nouslider/jquery.nouislider.min.js"></script>
<!-- Switchery -->
<script src="/assets/inspinia/js/plugins/switchery/switchery.js"></script>
<!-- IonRangeSlider -->
<script src="/assets/inspinia/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<!-- iCheck -->
<script src="/assets/inspinia/js/plugins/iCheck/icheck.min.js"></script>
<!-- MENU -->
<script src="/assets/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<!-- Color picker -->
<script src="/assets/inspinia/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- Clock picker -->
<script src="/assets/inspinia/js/plugins/clockpicker/clockpicker.js"></script>
<!-- Image cropper -->
<script src="/assets/inspinia/js/plugins/cropper/cropper.min.js"></script>
<!-- Date range picker -->

<!-- Custom and plugin javascript -->
<script src="/assets/inspinia/js/inspinia.js"></script>
<script src="/assets/inspinia/js/plugins/pace/pace.min.js"></script>

<!-- Flot -->
<script src="/assets/inspinia/js/plugins/flot/jquery.flot.js"></script>
<script src="/assets/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/assets/inspinia/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="/assets/inspinia/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/assets/inspinia/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="/assets/inspinia/js/plugins/flot/jquery.flot.symbol.js"></script>
<script src="/assets/inspinia/js/plugins/flot/jquery.flot.time.js"></script>

<!-- Peity -->
<script src="/assets/inspinia/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/assets/inspinia/js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="/assets/inspinia/js/inspinia.js"></script>

<script src="/assets/inspinia/js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- jQuery UI -->
<script src="/assets/inspinia/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Jvectormap -->
<script src="/assets/inspinia/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/assets/inspinia/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- EayPIE -->
<script src="/assets/inspinia/js/plugins/easypiechart/jquery.easypiechart.js"></script>

<!-- Sparkline -->
<script src="/assets/inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="/assets/inspinia/js/demo/sparkline-demo.js"></script>

<script src="/assets/inspinia/js/plugins/chartJs/Chart.min.js"></script>

<script src="/assets/js/jquery-form/jquery.form.js"></script>

<script src="/assets/inspinia/js/plugins/toastr/toastr.min.js"></script>

<!-- blueimp gallery -->
<script src="/assets/inspinia/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<!-- Sweet Alert -->
<script src="/assets/inspinia/js/plugins/sweetalert/sweetalert.min.js"></script>

<!-- jQuery UI custom -->
<script src="/assets/inspinia/js/jquery-ui.custom.min.js"></script>

<!-- Full Calendar -->
<script src="/assets/inspinia/js/plugins/fullcalendar/fullcalendar.min.js"></script>

</body>
</html>
