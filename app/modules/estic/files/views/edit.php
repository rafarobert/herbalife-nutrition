<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 07/05/2019
 * Time: 1:11 am
 * @var Model_Files $model_files
 * @var Model_Files $oFiles
 * @var Model_Files $oFile
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oFile->getIdFile()) ? "Agregar " . setLabel('File') : "Actualizando datos, " . setLabel('File #') . $oFile->getIdFile() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/files', setLabel('files')) ?>
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

                        <?= form_open_multipart("estic/files/edit/" . $oFile->getIdFile(), ["id" => "filesEdit", "class" => "form-horizontal"]) ?>

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
        echo form_default($data, set_value("name", $oFile->getName()), "")
        ?>
    </div>
</div>
<?php echo form_error("name"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputUrl" class="col-sm-2 control-label">Url</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'url',
  'id' => 'inputUrl',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("url", $oFile->getUrl()), "")
        ?>
    </div>
</div>
<?php echo form_error("url"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputExt" class="col-sm-2 control-label">Ext</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'ext',
  'id' => 'inputExt',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("ext", $oFile->getExt()), "")
        ?>
    </div>
</div>
<?php echo form_error("ext"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputRawName" class="col-sm-2 control-label">RawName</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'rawName',
  'id' => 'inputRawName',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("rawName", $oFile->getRawName()), "")
        ?>
    </div>
</div>
<?php echo form_error("rawName"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputFullPath" class="col-sm-2 control-label">FullPath</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'fullPath',
  'id' => 'inputFullPath',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("fullPath", $oFile->getFullPath()), "")
        ?>
    </div>
</div>
<?php echo form_error("fullPath"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputPath" class="col-sm-2 control-label">Path</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'path',
  'id' => 'inputPath',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("path", $oFile->getPath()), "")
        ?>
    </div>
</div>
<?php echo form_error("path"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputWidth" class="col-sm-2 control-label">Width</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'width',
  'id' => 'inputWidth',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("width", $oFile->getWidth()), "")
        ?>
    </div>
</div>
<?php echo form_error("width"); ?><div class="hr-line-dashed"></div>
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
        echo form_number($data, set_value("height", $oFile->getHeight()), "")
        ?>
    </div>
</div>
<?php echo form_error("height"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputSize" class="col-sm-2 control-label">Size</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'size',
  'id' => 'inputSize',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("size", $oFile->getSize()), "")
        ?>
    </div>
</div>
<?php echo form_error("size"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputLibrary" class="col-sm-2 control-label">Library</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'library',
  'id' => 'inputLibrary',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("library", $oFile->getLibrary()), "")
        ?>
    </div>
</div>
<?php echo form_error("library"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputNroThumbs" class="col-sm-2 control-label">NroThumbs</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'nroThumbs',
  'id' => 'inputNroThumbs',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("nroThumbs", $oFile->getNroThumbs()), "")
        ?>
    </div>
</div>
<?php echo form_error("nroThumbs"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdParent" class="col-sm-2 control-label">IdParent</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idParent',
  'id' => 'inputIdParent',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_files',
);
        //relatetionsOption
        echo form_select($data, $oS, $oFile->getIdParent());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idParent"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputThumbMarker" class="col-sm-2 control-label">ThumbMarker</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'thumbMarker',
  'id' => 'inputThumbMarker',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("thumbMarker", $oFile->getThumbMarker()), "")
        ?>
    </div>
</div>
<?php echo form_error("thumbMarker"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputType" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'type',
  'id' => 'inputType',
  'class' => 'form-control i-checks form-control ',
  'placeholder' => '',
  'options' => 
  array (
    'gif' => 'gif',
    'jpg' => 'jpg',
    'png' => 'png',
    'jpeg' => 'jpeg',
    'pdf' => 'pdf',
    'docx' => 'docx',
    'xlsx' => 'xlsx',
    'zip' => 'zip',
    'mp4' => 'mp4',
    'mp3' => 'mp3',
  ),
);
        //relatetionsOption
        echo form_radios($data, $data["options"], $oFile->getType());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("type"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputX" class="col-sm-2 control-label">X</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'x',
  'id' => 'inputX',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("x", $oFile->getX()), "")
        ?>
    </div>
</div>
<?php echo form_error("x"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputY" class="col-sm-2 control-label">Y</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'y',
  'id' => 'inputY',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("y", $oFile->getY()), "")
        ?>
    </div>
</div>
<?php echo form_error("y"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputFixWidth" class="col-sm-2 control-label">FixWidth</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'fixWidth',
  'id' => 'inputFixWidth',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("fixWidth", $oFile->getFixWidth()), "")
        ?>
    </div>
</div>
<?php echo form_error("fixWidth"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputFixHeight" class="col-sm-2 control-label">FixHeight</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'fixHeight',
  'id' => 'inputFixHeight',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("fixHeight", $oFile->getFixHeight()), "")
        ?>
    </div>
</div>
<?php echo form_error("fixHeight"); ?>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/files', 'Cancelar', 'class="btn btn-white"');
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
