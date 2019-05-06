<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 06/05/2019
 * Time: 3:02 am
 * @var Model_sessions $model_sessions
 * @var Model_sessions sessions
 * @var Model_sessions $Session
 * @var Model_Sessions $oSessions
 * @var ES_Model_Sessions $oSession
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Sesiones del Sistema</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor(WEBSERVER . 'estic', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de Sesiones del Sistema</strong>
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
                    <label class="control-label" for="product_name">Sesiones del Sistema</label>
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
                    <?= anchor(WEBSERVER . "estic/sessions/edit", "<i class='fa fa-plus'></i> Agregar Sesiones del Sistema", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                    <?php
                    
                    ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Ip Address</th>
                <th>Timestamp</th>
                <th>Last Activity</th>
                <th>Nombre del Usuario</th>
                
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (countStd($oSessions)) { ?>
                                <?php foreach ($oSessions as $oSession) {?>
                                    <tr>
                                        <td><?= $oSession->getIpAddress(); ?></td>               
                    <td><?= $oSession->getTimestamp(); ?></td>               
                    <td><?= $oSession->getLastActivity(); ?></td>               
                    <td><?= $oSession->getIdUserName() ." ".$oSession->getIdUserLastname(); ?></td>               
                                
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit("estic/sessions/edit/".$oSession->getId(), "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("estic/sessions/delete/" . $oSession->getId(), "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar sessions registrados</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Ip Address</th>
                <th>Timestamp</th>
                <th>Last Activity</th>
                <th>Nombre del Usuario</th>
                
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