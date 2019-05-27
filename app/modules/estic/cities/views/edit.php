<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 25/05/2019
 * Time: 12:50 pm
 * @var Model_Cities $model_cities
 * @var Model_Cities $oCities
 * @var Model_Cities $oCitie
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oCitie->getIdCity()) ? "Agregar " . setLabel('Citie') : "Actualizando datos, " . setLabel('Citie #') . $oCitie->getIdCity() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/cities', setLabel('cities')) ?>
            </li>
            <li class="active">
                <strong>Edicion de datos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>All form elements
                        <small>With custom checbox and radion elements.</small>
                    </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                    <?php
                    //startInsertEachOne
                        ?>

                        <?= form_open_multipart("estic/cities/edit/" . $oCitie->getIdCity(), ["id" => "citiesEdit", "class" => "form-horizontal"]) ?>

                        <div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'name',
  'id' => 'inputName',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("name", $oCitie->getName()), "")
        ?>
    </div>
</div>
<?php echo form_error("name"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="description"]', `<?=$oCitie->getDescription() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'description',
  'id' => 'inputDescription',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("description", $oCitie->getDescription()), "")
        ?>
    </div>
</div>
<?php echo form_error("description"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputAbbreviation" class="col-sm-2 control-label">Abbreviation</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'abbreviation',
  'id' => 'inputAbbreviation',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("abbreviation", $oCitie->getAbbreviation()), "")
        ?>
    </div>
</div>
<?php echo form_error("abbreviation"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdCapital" class="col-sm-2 control-label">IdCapital</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idCapital',
  'id' => 'inputIdCapital',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_cities',
);
        //relatetionsOption
        echo form_select($data, $oCapitals, $oCitie->getIdCapital());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idCapital"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdRegion" class="col-sm-2 control-label">IdRegion</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idRegion',
  'id' => 'inputIdRegion',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_cities',
);
        //relatetionsOption
        echo form_select($data, $oRegions, $oCitie->getIdRegion());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idRegion"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputLat" class="col-sm-2 control-label">Lat</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'lat',
  'id' => 'inputLat',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("lat", $oCitie->getLat()), "")
        ?>
    </div>
</div>
<?php echo form_error("lat"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputLng" class="col-sm-2 control-label">Lng</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'lng',
  'id' => 'inputLng',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("lng", $oCitie->getLng()), "")
        ?>
    </div>
</div>
<?php echo form_error("lng"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputArea" class="col-sm-2 control-label">Area</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'area',
  'id' => 'inputArea',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("area", $oCitie->getArea()), "")
        ?>
    </div>
</div>
<?php echo form_error("area"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputNroMunicipios" class="col-sm-2 control-label">NroMunicipios</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'nroMunicipios',
  'id' => 'inputNroMunicipios',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("nroMunicipios", $oCitie->getNroMunicipios()), "")
        ?>
    </div>
</div>
<?php echo form_error("nroMunicipios"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputSurface" class="col-sm-2 control-label">Surface</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'surface',
  'id' => 'inputSurface',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("surface", $oCitie->getSurface()), "")
        ?>
    </div>
</div>
<?php echo form_error("surface"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <script>oDropZone.dataName = 'citie'</script>
    <label for="inputIdsFiles" class="col-sm-2 control-label">IdsFiles</label>
    <div class="col-sm-10 dropzone" action="#">
        <div class="dropzone-previews"></div>
    </div>
        <?php $files = $oCitie->getFiles(); ?>
    <script>
        oDropZone.inputName = 'idsFiles';
        oDropZone.inputId = 'inputIdsFiles';
        oDropZone.inputIdMainFile = 'inputIdCoverPicture';
        oDropZone.inputNameMainFile = 'idCoverPicture';
        oDropZone.idFotoPrincipal = '<?=$oCitie->getIdCoverPicture()?>';
    </script>
        <?php if(isArray($files)){ ?>
    <script>
        <?php foreach ($files as $ind => $file){ ?>
        oDropZone.uploads['<?=$ind?>'] = {};
        oDropZone.uploads['<?=$ind?>'].data = JSON.parse(`<?=json_encode($file->getArrayDataWithThumbs())?>`);
        oDropZone.uploads['<?=$ind?>'].dir = '<?=$file->getUrl()?>';
        oDropZone.uploads['<?=$ind?>'].error = 'ok';
        oDropZone.uploads['<?=$ind?>'].fromAjax = true;
        oDropZone.uploads['<?=$ind?>'].pk= '<?=$file->getIdFile()?>';
        oDropZone.uploads['<?=$ind?>'].tableRef= '<?=$oCitie->getTableName()?>';
        oDropZone.uploads['<?=$ind?>'].pkTableRef= '<?=setObject($oCitie->getPrimaryKey())?>';
        oDropZone.uploads['<?=$ind?>'].idCityRef= '<?=$oCitie->getIdCity()?>';
        oDropZone.uploads['<?=$ind?>'].fieldTableRef= 'IdsFiles';
        <?php } ?>
    </script>
        <?php } ?>
    <?php
    $data = array (
  'name' => 'idsFiles',
  'id' => 'inputIdsFiles',
  'class' => 'form-control ',
  'placeholder' => '',
);
    echo form_hidden($data, set_value("idsFiles", $oCitie->getIdsFiles()), "")
    ?>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdCoverPicture" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idCoverPicture',
  'id' => 'inputIdCoverPicture',
  'class' => 'display-none',
  'placeholder' => '',
  'table' => 'es_files',
);
        //relatetionsOption
        echo form_hidden($data, $oFiles, $oCitie->getIdCoverPicture());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idCoverPicture"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputHeight" class="col-sm-2 control-label">Height</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'height',
  'id' => 'inputHeight',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("height", $oCitie->getHeight()), "")
        ?>
    </div>
</div>
<?php echo form_error("height"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputTipo" class="col-sm-2 control-label">Tipo</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'tipo',
  'id' => 'inputTipo',
  'class' => 'form-control i-checks form-control ',
  'placeholder' => '',
  'options' => 
  array (
    'region' => 'region',
    'ciudad' => 'ciudad',
    'capital' => 'capital',
  ),
);
        //relatetionsOption
        echo form_radios($data, $data["options"], $oCitie->getTipo());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("tipo"); ?>





                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/cities', 'Cancelar', 'class="btn btn-white"');
                                $data = array(
                                    "name" => "save",
                                    "value" => "Guardar",
                                    "id" => "btnSave",
                                    "class" => "btn btn-primary",
                                    "onclick" => "oPageBack.onSubmit()"
                                );
                                echo form_submit($data) ?>
                            </div>
                        </div>
                        <?php echo form_close();
                        if (validateArray($errors, 'error')) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $errors['error'] ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        //endInsertEachOne
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
