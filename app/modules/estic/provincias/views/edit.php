<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/05/2019
 * Time: 2:12 am
 * @var Model_Provincias $model_provincias
 * @var Model_Provincias $oProvincias
 * @var Model_Provincias $oProvincia
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oProvincia->getIdProvincia()) ? "Agregar " . setLabel('Provincia') : "Actualizando datos, " . setLabel('Provincia #') . $oProvincia->getIdProvincia() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/provincias', setLabel('provincias')) ?>
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

                        <?= form_open_multipart("estic/provincias/edit/" . $oProvincia->getIdProvincia(), ["id" => "provinciasEdit", "class" => "form-horizontal"]) ?>

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
        echo form_default($data, set_value("name", $oProvincia->getName()), "")
        ?>
    </div>
</div>
<?php echo form_error("name"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputArea" class="col-sm-2 control-label">Area</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="area"]', `<?=$oProvincia->getArea() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'area',
  'id' => 'inputArea',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("area", $oProvincia->getArea()), "")
        ?>
    </div>
</div>
<?php echo form_error("area"); ?><div class="hr-line-dashed"></div>
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
        echo form_number($data, set_value("lat", $oProvincia->getLat()), "")
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
        echo form_number($data, set_value("lng", $oProvincia->getLng()), "")
        ?>
    </div>
</div>
<?php echo form_error("lng"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdMunicipio" class="col-sm-2 control-label">IdMunicipio</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idMunicipio',
  'id' => 'inputIdMunicipio',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_provincias',
);
        //relatetionsOption
        echo form_select($data, $oProvincias, $oProvincia->getIdMunicipio());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idMunicipio"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdCiudad" class="col-sm-2 control-label">IdCiudad</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idCiudad',
  'id' => 'inputIdCiudad',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_cities',
);
        //relatetionsOption
        echo form_select($data, $oCities, $oProvincia->getIdCiudad());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idCiudad"); ?>





                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/provincias', 'Cancelar', 'class="btn btn-white"');
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
