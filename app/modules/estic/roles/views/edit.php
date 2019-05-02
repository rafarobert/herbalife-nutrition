<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/05/2019
 * Time: 1:44 am
 * @var Model_Roles $model_roles
 * @var Model_Roles $oRoles
 * @var Model_Roles $oRole
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oRole->getIdRole()) ? "Agregar " . setLabel('Role') : "Actualizando datos, " . setLabel('Role #') . $oRole->getIdRole() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/roles', setLabel('roles')) ?>
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

                        <?= form_open_multipart("estic/roles/edit/" . $oRole->getIdRole(), ["id" => "rolesEdit", "class" => "form-horizontal"]) ?>

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
        echo form_default($data, set_value("name", $oRole->getName()), "")
        ?>
    </div>
</div>
<?php echo form_error("name"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="description"]', `<?=$oRole->getDescription() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'description',
  'id' => 'inputDescription',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("description", $oRole->getDescription()), "")
        ?>
    </div>
</div>
<?php echo form_error("description"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputWrite" class="col-sm-2 control-label">Write</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'write',
  'id' => 'inputWrite',
  'class' => 'form-control i-checks form-control ',
  'placeholder' => '',
  'options' => 
  array (
    'on' => 'on',
    'off' => 'off',
  ),
);
        //relatetionsOption
        echo form_radios($data, $data["options"], $oRole->getWrite());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("write"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputRead" class="col-sm-2 control-label">Read</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'read',
  'id' => 'inputRead',
  'class' => 'form-control i-checks form-control ',
  'placeholder' => '',
  'options' => 
  array (
    'on' => 'on',
    'off' => 'off',
  ),
);
        //relatetionsOption
        echo form_radios($data, $data["options"], $oRole->getRead());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("read"); ?>





                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/roles', 'Cancelar', 'class="btn btn-white"');
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
