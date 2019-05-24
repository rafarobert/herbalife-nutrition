<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 * @var Model_Messages $model_messages
 * @var Model_Messages $oMessages
 * @var Model_Messages $oMessage
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oMessage->getIdMessage()) ? "Agregar " . setLabel('Message') : "Actualizando datos, " . setLabel('Message #') . $oMessage->getIdMessage() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/messages', setLabel('messages')) ?>
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

                        <?= form_open_multipart("estic/messages/edit/" . $oMessage->getIdMessage(), ["id" => "messagesEdit", "class" => "form-horizontal"]) ?>

                        <div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputPhoneNumber" class="col-sm-2 control-label">PhoneNumber</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'phoneNumber',
  'id' => 'inputPhoneNumber',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("phoneNumber", $oMessage->getPhoneNumber()), "")
        ?>
    </div>
</div>
<?php echo form_error("phoneNumber"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputCountryCode" class="col-sm-2 control-label">CountryCode</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'countryCode',
  'id' => 'inputCountryCode',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("countryCode", $oMessage->getCountryCode()), "")
        ?>
    </div>
</div>
<?php echo form_error("countryCode"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputAuthyId" class="col-sm-2 control-label">AuthyId</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'authyId',
  'id' => 'inputAuthyId',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("authyId", $oMessage->getAuthyId()), "")
        ?>
    </div>
</div>
<?php echo form_error("authyId"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputVerified" class="col-sm-2 control-label">Verified</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'verified',
  'id' => 'inputVerified',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("verified", $oMessage->getVerified()), "")
        ?>
    </div>
</div>
<?php echo form_error("verified"); ?>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/messages', 'Cancelar', 'class="btn btn-white"');
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
