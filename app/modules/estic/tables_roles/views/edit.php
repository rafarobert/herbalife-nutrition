<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/05/2019
 * Time: 1:44 am
 * @var Model_Tables_roles $model_tables_roles
 * @var Model_Tables_roles $oTablesRoles
 * @var Model_Tables_roles $oTableRole
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oTableRole->getIdTableRole()) ? "Agregar " . setLabel('Table Role') : "Actualizando datos, " . setLabel('Table_role #') . $oTableRole->getIdTableRole() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/tables_roles', setLabel('tables_roles')) ?>
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

                        <?= form_open_multipart("estic/tables_roles/edit/" . $oTableRole->getIdTableRole(), ["id" => "tables_rolesEdit", "class" => "form-horizontal"]) ?>

                        <div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdTable" class="col-sm-2 control-label">IdTable</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idTable',
  'id' => 'inputIdTable',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_tables',
);
        //relatetionsOption
        echo form_select($data, $oTables, $oTableRole->getIdTable());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idTable"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdRole" class="col-sm-2 control-label">IdRole</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idRole',
  'id' => 'inputIdRole',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_roles',
);
        //relatetionsOption
        echo form_select($data, $oRoles, $oTableRole->getIdRole());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idRole"); ?>





                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/tables_roles', 'Cancelar', 'class="btn btn-white"');
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
