<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 06/05/2019
 * Time: 3:04 am
 * @var Model_Sessions $model_sessions
 * @var Model_Sessions $oSessions
 * @var Model_Sessions $oSession
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oSession->getId()) ? "Agregar " . setLabel('Sesiones del Sistema') : "Actualizando datos, " . setLabel('Session #') . $oSession->getId() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/sessions', setLabel('sessions')) ?>
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

                        <?= form_open_multipart("estic/sessions/edit/" . $oSession->getId(), ["id" => "sessionsEdit", "class" => "form-horizontal"]) ?>

                        <div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIpAddress" class="col-sm-2 control-label">IpAddress</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'ipAddress',
  'id' => 'inputIpAddress',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("ipAddress", $oSession->getIpAddress()), "")
        ?>
    </div>
</div>
<?php echo form_error("ipAddress"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputTimestamp" class="col-sm-2 control-label">Timestamp</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'timestamp',
  'id' => 'inputTimestamp',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("timestamp", $oSession->getTimestamp()), "")
        ?>
    </div>
</div>
<?php echo form_error("timestamp"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputData" class="col-sm-2 control-label">Datos en sesion</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'data',
  'id' => 'inputData',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("data", $oSession->getData()), "")
        ?>
    </div>
</div>
<?php echo form_error("data"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputLastActivity" class="col-sm-2 control-label">LastActivity</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'lastActivity',
  'id' => 'inputLastActivity',
  'class' => 'form-control ',
  'placeholder' => '',
  'size' => 16,
  'readonly' => true,
);
        echo form_input($data, set_value("lastActivity", $oSession->getLastActivity()), "")
        ?>
    </div>
</div>
<?php echo form_error("lastActivity"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdUser" class="col-sm-2 control-label">Nombre del Usuario</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idUser',
  'id' => 'inputIdUser',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_users',
);
        //relatetionsOption
        echo form_select($data, $oUsers, $oSession->getIdUser());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idUser"); ?>



<div class="hr-line-dashed"></div>
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
        echo form_number($data, set_value("lng", $oSession->getLng()), "")
        ?>
    </div>
</div>
<?php echo form_error("lng"); ?><div class="hr-line-dashed"></div>
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
        echo form_number($data, set_value("lat", $oSession->getLat()), "")
        ?>
    </div>
</div>
<?php echo form_error("lat"); ?>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/sessions', 'Cancelar', 'class="btn btn-white"');
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
