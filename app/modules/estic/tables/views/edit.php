<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/05/2019
 * Time: 2:12 am
 * @var Model_Tables $model_tables
 * @var Model_Tables $oTables
 * @var Model_Tables $oTable
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oTable->getIdTable()) ? "Agregar " . setLabel('Table') : "Actualizando datos, " . setLabel('Table #') . $oTable->getIdTable() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('estic', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('estic/tables', setLabel('tables')) ?>
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

                        <?= form_open_multipart("estic/tables/edit/" . $oTable->getIdTable(), ["id" => "tablesEdit", "class" => "form-horizontal"]) ?>

                        <div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdModule" class="col-sm-2 control-label">Modulo</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idModule',
  'id' => 'inputIdModule',
  'class' => 'chosen-select ',
  'placeholder' => '',
  'table' => 'es_modules',
);
        //relatetionsOption
        echo form_select($data, $oModules, $oTable->getIdModule());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idModule"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIdRole" class="col-sm-2 control-label">Roles Admitidos</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'idRole',
  'id' => 'inputIdRole',
  'class' => 'form-control i-checks ',
  'placeholder' => '',
  'table' => 'es_roles',
);
        //relatetionsOption
        echo form_radios($data, $oRoles, $oTable->getIdRole());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("idRole"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputTitle" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'title',
  'id' => 'inputTitle',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("title", $oTable->getTitle()), "")
        ?>
    </div>
</div>
<?php echo form_error("title"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputTableName" class="col-sm-2 control-label">Tablas</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'tableName',
  'id' => 'inputTableName',
  'class' => 'chosen-select chosen-select ',
  'placeholder' => '',
  'options' => 'db_tabs',
);
        //relatetionsOption
        echo form_select($data, $aDBTables, $oTable->getTableName());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("tableName"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputListed" class="col-sm-2 control-label">Listed</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'listed',
  'id' => 'inputListed',
  'class' => 'form-control i-checks form-control ',
  'placeholder' => '',
  'options' => 
  array (
    'enabled' => 'enabled',
    'disabled' => 'disabled',
  ),
);
        //relatetionsOption
        echo form_radios($data, $data["options"], $oTable->getListed());
        //printSecondItem
        ?>
    </div>
</div>
<?php echo form_error("listed"); ?>



<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="description"]', `<?=$oTable->getDescription() ?>`);
        </script>
        <?php
        $data = array (
  'name' => 'description',
  'id' => 'inputDescription',
  'class' => 'form-control textTinymce ',
  'placeholder' => '',
);
        echo form_textarea($data, set_value("description", $oTable->getDescription()), "")
        ?>
    </div>
</div>
<?php echo form_error("description"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputIcon" class="col-sm-2 control-label">Icon</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'icon',
  'id' => 'inputIcon',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("icon", $oTable->getIcon()), "")
        ?>
    </div>
</div>
<?php echo form_error("icon"); ?><div class="hr-line-dashed"></div>
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
        echo form_default($data, set_value("url", $oTable->getUrl()), "")
        ?>
    </div>
</div>
<?php echo form_error("url"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputUrlEdit" class="col-sm-2 control-label">UrlEdit</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'urlEdit',
  'id' => 'inputUrlEdit',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("urlEdit", $oTable->getUrlEdit()), "")
        ?>
    </div>
</div>
<?php echo form_error("urlEdit"); ?><div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="inputUrlIndex" class="col-sm-2 control-label">UrlIndex</label>
    <div class="col-sm-10">
        <?php
        $data = array (
  'name' => 'urlIndex',
  'id' => 'inputUrlIndex',
  'class' => 'form-control ',
  'placeholder' => '',
);
        echo form_default($data, set_value("urlIndex", $oTable->getUrlIndex()), "")
        ?>
    </div>
</div>
<?php echo form_error("urlIndex"); ?>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('estic/tables', 'Cancelar', 'class="btn btn-white"');
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
