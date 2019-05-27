<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 25/05/2019
 * Time: 12:50 pm
 * @var Model_Domains $model_domains
 * @var Model_Domains $oDomains
 * @var Model_Domains $oDomain
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oDomain->getIdDomain()) ? "Agregar " . setLabel('Domain') : "Actualizando datos, " . setLabel('Domain #') . $oDomain->getIdDomain() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/domains', setLabel('domains')) ?>
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

                        <?= form_open_multipart("estic/domains/edit/" . $oDomain->getIdDomain(), ["id" => "domainsEdit", "class" => "form-horizontal"]) ?>

                        <div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputHost" class="col-sm-2 control-label">Host</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'host',
  'id' => 'inputHost',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("host", $oDomain->getHost()), "")
        ?>
    </div>
</div>
<?php echo form_error("host"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputHostname" class="col-sm-2 control-label">Hostname</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'hostname',
  'id' => 'inputHostname',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("hostname", $oDomain->getHostname()), "")
        ?>
    </div>
</div>
<?php echo form_error("hostname"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputProtocol" class="col-sm-2 control-label">Protocol</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'protocol',
  'id' => 'inputProtocol',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("protocol", $oDomain->getProtocol()), "")
        ?>
    </div>
</div>
<?php echo form_error("protocol"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputPort" class="col-sm-2 control-label">Port</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'port',
  'id' => 'inputPort',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("port", $oDomain->getPort()), "")
        ?>
    </div>
</div>
<?php echo form_error("port"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputOrigin" class="col-sm-2 control-label">Origin</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'origin',
  'id' => 'inputOrigin',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("origin", $oDomain->getOrigin()), "")
        ?>
    </div>
</div>
<?php echo form_error("origin"); ?>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/domains', 'Cancelar', 'class="btn btn-white"');
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
