<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 06/05/2019
 * Time: 3:02 am
 * @var Model_logs $model_logs
 * @var Model_logs logs
 * @var Model_logs $Log
 * @var Model_Logs $oLogs
 * @var ES_Model_Logs $oLog
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Log</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor(WEBSERVER . 'estic', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de Log</strong>
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
                    <label class="control-label" for="product_name">Log</label>
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
                    <?= anchor(WEBSERVER . "estic/logs/edit", "<i class='fa fa-plus'></i> Agregar Log", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                    <?php
                    
                    ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Heading</th>
                <th>Message</th>
                <th>Action</th>
                <th>Code</th>
                <th>Level</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (countStd($oLogs)) { ?>
                                <?php foreach ($oLogs as $oLog) {?>
                                    <tr>
                                        <td><?= $oLog->getHeading(); ?></td>               
                    <td><?= $oLog->getMessage(); ?></td>               
                    <td><?= $oLog->getAction(); ?></td>               
                    <td><?= $oLog->getCode(); ?></td>               
                    <td><?= $oLog->getLevel(); ?></td>               
                    <td><?= $oLog->getDateCreated(); ?></td>
            
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit("estic/logs/edit/".$oLog->getIdLog(), "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("estic/logs/delete/" . $oLog->getIdLog(), "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar logs registrados</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Heading</th>
                <th>Message</th>
                <th>Action</th>
                <th>Code</th>
                <th>Level</th>
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