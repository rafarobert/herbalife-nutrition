<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 10/05/2019
 * Time: 12:57 am
 * @var Model_tables $model_tables
 * @var Model_tables tables
 * @var Model_tables $Table
 * @var Model_Tables $oTables
 * @var ES_Model_Tables $oTable
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Table</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor(WEBSERVER . 'estic', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de Table</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name">Table</label>
                    <input type="text" id="product_name" name="product_name" value=""
                           placeholder="Product Name" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5></h5>
                    <?= anchor(WEBSERVER . "estic/tables/edit", "<i class='fa fa-plus'></i> Agregar Table", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                    <?php
                    
                    ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Title</th>
                <th>Listed</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Url</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (countStd($oTables)) { ?>
                                <?php foreach ($oTables as $oTable) {?>
                                    <tr>
                                        <td><?= $oTable->getTitle(); ?></td>               
                    <td><?= $oTable->getListed(); ?></td>               
                    <td><?= $oTable->getDescription(); ?></td>               
                    <td><?= $oTable->getIcon(); ?></td>               
                    <td><?= $oTable->getUrl(); ?></td>               
                    <td><?= $oTable->getDateCreated(); ?></td>
            
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit("estic/tables/edit/".$oTable->getIdTable(), "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("estic/tables/delete/" . $oTable->getIdTable(), "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar tables registrados</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                <th>Listed</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Url</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Estic Framework &copy; 2018-2019
    </div>
</div>