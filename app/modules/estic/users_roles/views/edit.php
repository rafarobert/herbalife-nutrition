<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 25/05/2019
 * Time: 12:50 pm
 * @var Model_Users_roles $model_users_roles
 * @var Model_Users_roles $oUsersRoles
 * @var Model_Users_roles $oUserRole
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oUserRole->getIdUserRole()) ? "Agregar " . setLabel('User Role') : "Actualizando datos, " . setLabel('User_role #') . $oUserRole->getIdUserRole() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/users_roles', setLabel('users_roles')) ?>
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

                        <?= form_open_multipart("estic/users_roles/edit/" . $oUserRole->getIdUserRole(), ["id" => "users_rolesEdit", "class" => "form-horizontal"]) ?>

                        <div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdUser" class="col-sm-2 control-label">IdUser</label>
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
        echo form_select($data, $oUsers, $oUserRole->getIdUser());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idUser"); ?>



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
        echo form_select($data, $oRoles, $oUserRole->getIdRole());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idRole"); ?>





                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/users_roles', 'Cancelar', 'class="btn btn-white"');
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
