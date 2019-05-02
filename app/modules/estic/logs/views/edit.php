<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/05/2019
 * Time: 1:44 am
 * @var Model_Logs $model_logs
 * @var Model_Logs $oLogs
 * @var Model_Logs $oLog
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oLog->getIdLog()) ? "Agregar " . setLabel('Log') : "Actualizando datos, " . setLabel('Log #') . $oLog->getIdLog() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/logs', setLabel('logs')) ?>
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

                        <?= form_open_multipart("estic/logs/edit/" . $oLog->getIdLog(), ["id" => "logsEdit", "class" => "form-horizontal"]) ?>

                        <div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputHeading" class="col-sm-2 control-label">Heading</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'heading',
  'id' => 'inputHeading',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("heading", $oLog->getHeading()), "")
        ?>
    </div>
</div>
<?php echo form_error("heading"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputMessage" class="col-sm-2 control-label">Message</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="message"]', `<?=$oLog->getMessage() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'message',
  'id' => 'inputMessage',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("message", $oLog->getMessage()), "")
        ?>
    </div>
</div>
<?php echo form_error("message"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputAction" class="col-sm-2 control-label">Action</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'action',
  'id' => 'inputAction',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("action", $oLog->getAction()), "")
        ?>
    </div>
</div>
<?php echo form_error("action"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputCode" class="col-sm-2 control-label">Code</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'code',
  'id' => 'inputCode',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("code", $oLog->getCode()), "")
        ?>
    </div>
</div>
<?php echo form_error("code"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputLevel" class="col-sm-2 control-label">Level</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'level',
  'id' => 'inputLevel',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("level", $oLog->getLevel()), "")
        ?>
    </div>
</div>
<?php echo form_error("level"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputFile" class="col-sm-2 control-label">File</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="file"]', `<?=$oLog->getFile() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'file',
  'id' => 'inputFile',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("file", $oLog->getFile()), "")
        ?>
    </div>
</div>
<?php echo form_error("file"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputLine" class="col-sm-2 control-label">Line</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'line',
  'id' => 'inputLine',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("line", $oLog->getLine()), "")
        ?>
    </div>
</div>
<?php echo form_error("line"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputTrace" class="col-sm-2 control-label">Trace</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="trace"]', `<?=$oLog->getTrace() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'trace',
  'id' => 'inputTrace',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("trace", $oLog->getTrace()), "")
        ?>
    </div>
</div>
<?php echo form_error("trace"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputPrevious" class="col-sm-2 control-label">Previous</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'previous',
  'id' => 'inputPrevious',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("previous", $oLog->getPrevious()), "")
        ?>
    </div>
</div>
<?php echo form_error("previous"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputXdebugMessage" class="col-sm-2 control-label">XdebugMessage</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="xdebugMessage"]', `<?=$oLog->getXdebugMessage() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'xdebugMessage',
  'id' => 'inputXdebugMessage',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("xdebugMessage", $oLog->getXdebugMessage()), "")
        ?>
    </div>
</div>
<?php echo form_error("xdebugMessage"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputType" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'type',
  'id' => 'inputType',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_number($data, set_value("type", $oLog->getType()), "")
        ?>
    </div>
</div>
<?php echo form_error("type"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputPost" class="col-sm-2 control-label">Post</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="post"]', `<?=$oLog->getPost() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'post',
  'id' => 'inputPost',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("post", $oLog->getPost()), "")
        ?>
    </div>
</div>
<?php echo form_error("post"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputSeverity" class="col-sm-2 control-label">Severity</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'severity',
  'id' => 'inputSeverity',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("severity", $oLog->getSeverity()), "")
        ?>
    </div>
</div>
<?php echo form_error("severity"); ?>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/logs', 'Cancelar', 'class="btn btn-white"');
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
