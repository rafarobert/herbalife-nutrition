<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 11/18/2017
 * Time: 1:24 AM
 * @var CiSettings $sysSetting
 */

?>

<script>

    var ROOTPATH = "<?=ROOTPATH ?>";
    var WEB_SERVER = "<?=WEBSERVER ?>";
    var WEB_ROOT = "<?=WEBROOT ?>";
    var PROTOCOL = "<?=PROTOCOL ?>";
    var BASEPATH = "<?=BASEPATH ?>";
    var APPPATH = "<?=APPPATH ?>";
    var ORMPATH = "<?=ORMPATH ?>";
    var FCPATH = "<?=FCPATH ?>";
    var SYSDIR = "<?=SYSDIR ?>";

    oPageBack.ROOTPATH = ROOTPATH ;
    oPageBack.WEB_SERVER = WEB_SERVER;
    oPageBack.WEB_ROOT = WEB_ROOT;
    oPageBack.PROTOCOL = PROTOCOL;
    oPageBack.BASEPATH = BASEPATH;
    oPageBack.APPPATH = APPPATH;
    oPageBack.ORMPATH = ORMPATH;
    oPageBack.FCPATH = FCPATH;
    oPageBack.SYSDIR = SYSDIR;
    oPageBack.encryptKey = '<?=config_item('encryption_key')?>';
    oPageBack.aUserLogguedIn = JSON.parse('<?=safe_json_encode(isset($aUserLogguedIn) ? $aUserLogguedIn : [])?>');
    oPageBack.aSessData = JSON.parse('<?=safe_json_encode(isset($aSessData) ? $aSessData : [])?>');
    oPageBack.aRolesFromSess = JSON.parse('<?=safe_json_encode(isset($aRolesFromSess) ? $aRolesFromSess : [])?>');

    // ------------------- Functions on ready ----------------------
    $(document).ready(function() {
        oPageBack.init();
    });
    // ------------------ functions loaded ----------------------

    // -------------------- Load Libraries ----------------------
    oDropZone.maxWidth = <?=isset($imgMaxWidth) ? $imgMaxWidth : 0 ?>;
    oDropZone.maxHeight = <?=isset($imgMaxHeight) ? $imgMaxHeight : 0 ?>;
    oDropZone.maxSize = <?=isset($fileMaxSize) ? $fileMaxSize : 0 ?>;
    oDropZone.validTypes = "<?=isset($fileTypes) ? $fileTypes : '' ?>";
    oDropZone.validTypesJs = "<?=isset($fileTypesJs) ? $fileTypesJs : '' ?>";

</script>
