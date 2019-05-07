<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 07/05/2019
 * Time: 1:10 am
 * @var Model_cities $model_cities
 * @var Model_cities cities
 * @var Model_cities $Citie
 * @var Model_Cities $oCities
 * @var ES_Model_Cities $oCitie
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Citie</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor(WEBSERVER . 'estic', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de Citie</strong>
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
                    <label class="control-label" for="product_name">Citie</label>
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
                    <?= anchor(WEBSERVER . "estic/cities/edit", "<i class='fa fa-plus'></i> Agregar Citie", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                    <?php
                    
                    ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Name</th>
                <th>Description</th>
                <th>Abbreviation</th>
                <th>Lat</th>
                <th>Lng</th>
                <th>Fecha de creación</th>
            
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (countStd($oCities)) { ?>
                                <?php foreach ($oCities as $oCitie) {?>
                                    <tr>
                                        <td><?= $oCitie->getName(); ?></td>               
                    <td><?= $oCitie->getDescription(); ?></td>               
                    <td><?= $oCitie->getAbbreviation(); ?></td>               
                    <td><?= $oCitie->getLat(); ?></td>               
                    <td><?= $oCitie->getLng(); ?></td>               
                    <td><?= $oCitie->getDateCreated(); ?></td>
            
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit("estic/cities/edit/".$oCitie->getIdCity(), "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("estic/cities/delete/" . $oCitie->getIdCity(), "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar cities registrados</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                <th>Description</th>
                <th>Abbreviation</th>
                <th>Lat</th>
                <th>Lng</th>
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