<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 07/05/2019
 * Time: 1:11 am
 * @var Model_files $model_files
 * @var Model_files files
 * @var Model_files $File
 * @var Model_Files $oFiles
 * @var ES_Model_Files $oFile
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de File</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor(WEBSERVER . 'estic', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de File</strong>
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
                    <label class="control-label" for="product_name">File</label>
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
                    <?= anchor(WEBSERVER . "estic/files/edit", "<i class='fa fa-plus'></i> Agregar File", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                    <?php
                    
                    ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Name</th>
                <th>Url</th>
                <th>Ext</th>
                <th>Path</th>
                <th>Width</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (countStd($oFiles)) { ?>
                                <?php foreach ($oFiles as $oFile) {?>
                                    <tr>
                                        <td><?= $oFile->getName(); ?></td>               
                    <td><?= $oFile->getUrl(); ?></td>               
                    <td><?= $oFile->getExt(); ?></td>               
                    <td><?= $oFile->getPath(); ?></td>               
                    <td><?= $oFile->getWidth(); ?></td>               
                    <td><?= $oFile->getDateCreated(); ?></td>
            
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit("estic/files/edit/".$oFile->getIdFile(), "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("estic/files/delete/" . $oFile->getIdFile(), "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar files registrados</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                <th>Url</th>
                <th>Ext</th>
                <th>Path</th>
                <th>Width</th>
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