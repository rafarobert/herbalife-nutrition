<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/05/2019
 * Time: 1:44 am
 * @var Model_domains $model_domains
 * @var Model_domains domains
 * @var Model_domains $Domain
 * @var Model_Domains $oDomains
 * @var ES_Model_Domains $oDomain
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Domain</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor(WEBSERVER . 'estic', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de Domain</strong>
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
                    <label class="control-label" for="product_name">Domain</label>
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
                    <?= anchor(WEBSERVER . "estic/domains/edit", "<i class='fa fa-plus'></i> Agregar Domain", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                    <?php
                    
                    ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Host</th>
                <th>Hostname</th>
                <th>Protocol</th>
                <th>Port</th>
                <th>Origin</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (countStd($oDomains)) { ?>
                                <?php foreach ($oDomains as $oDomain) {?>
                                    <tr>
                                        <td><?= $oDomain->getHost(); ?></td>               
                    <td><?= $oDomain->getHostname(); ?></td>               
                    <td><?= $oDomain->getProtocol(); ?></td>               
                    <td><?= $oDomain->getPort(); ?></td>               
                    <td><?= $oDomain->getOrigin(); ?></td>               
                    <td><?= $oDomain->getDateCreated(); ?></td>
            
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit("estic/domains/edit/".$oDomain->getIdDomain(), "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("estic/domains/delete/" . $oDomain->getIdDomain(), "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar domains registrados</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Host</th>
                <th>Hostname</th>
                <th>Protocol</th>
                <th>Port</th>
                <th>Origin</th>
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